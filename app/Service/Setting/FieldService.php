<?php

namespace App\Service\Setting;

use App\Models\Field;
use App\Models\Subgroup;
use Illuminate\Support\Facades\DB;

class FieldService
{
    public function createField(array $data)
    {
        DB::beginTransaction();
        try {
            $field = Field::create([
                'field_name' => $data['field_name'],
                'field_id' => $data['field_id'],
                'description' => $data['description'],
                'major_id' => $data['major_id']
            ]);

            if (isset($data['subgroups'])) {
                foreach ($data['subgroups'] as $subgroupData) {
                    $subgroup = Subgroup::create([
                        'subgroup_name' => $subgroupData['name'],
                        'description' => $subgroupData['description']
                    ]);

                    $field->subGroups()->attach($subgroup->id);
                }
            }

            DB::commit();
            return $field;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function getAllFields()
    {
        return Field::latest()->get();
    }

    public function getField($id)
    {
        return Field::with(['major', 'subGroups'])->findOrFail($id);
    }

    public function updateField($id, array $data)
    {
        DB::beginTransaction();
        $field = Field::findOrFail($id);
        $field->update([
            'field_name' => $data['field_name'],
            'field_id' => $data['field_id'],
            'description' => $data['description'],
            'major_id' => $data['major_id']
        ]);

        if (isset($data['subgroups'])) {
            $existingSubgroupIds = $field->subGroups->pluck('id')->toArray();
            $updatedSubgroupIds = [];

            foreach ($data['subgroups'] as $subgroupData) {
                if (isset($subgroupData['id'])) {
                    $subgroup = Subgroup::find($subgroupData['id']);
                    if ($subgroup) {
                        $subgroup->update([
                            'subgroup_name' => $subgroupData['name'],
                            'description' => $subgroupData['description']
                        ]);
                        $updatedSubgroupIds[] = $subgroup->id;
                    }
                } else {
                    $subgroup = Subgroup::create([
                        'subgroup_name' => $subgroupData['name'],
                        'description' => $subgroupData['description']
                    ]);
                    $field->subGroups()->attach($subgroup->id);
                    $updatedSubgroupIds[] = $subgroup->id;
                }
            }
            $removedSubgroupIds = array_diff($existingSubgroupIds, $updatedSubgroupIds);
            if (!empty($removedSubgroupIds)) {
                $field->subGroups()->detach($removedSubgroupIds);
                Subgroup::whereIn('id', $removedSubgroupIds)->delete();
            }
        }

        DB::commit();
        return $field->fresh(['subGroups']);
    }

    public function deleteField($id)
    {
        $field = Field::findOrFail($id);
        return $field->delete();
    }

    public function deleteSubgroup($fieldId, $subgroupId)
    {
        DB::beginTransaction();
        $field = Field::findOrFail($fieldId);
        $field->subGroups()->detach($subgroupId);
        Subgroup::where('id', $subgroupId)->delete();
        DB::commit();
        return true;
    }
}