<?php

namespace Blopes\SharedModels\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agents = [
            'Architect',
            'Building services engineer',
            'Civil engineer',
            'Client',
            'Cost consultant',
            'Lead designer',
            'Project lead',
            'Structural engineer',
            'Construction lead',
            'Contract administrator',
            'Health and safety adviser',
            'Landscape Architect',
            'Lift engineer',
            'Environmental consultant',
            'Other consultant(s)',
            'Project team',
            'TAME consultant',
            'Lead contractor',
            'Asset management lead',
            'Employer',
            "Employer's project management",
            'Asset management team',
            'Geotechnical consultant',
            'MEICA consultant',
            'Built asset security manager',
            'Access consultant',
            'Acoustic consultant',
            'Archaeological consultant',
            'Architectural design',
            'Asset management advisor',
            'BIM manager',
            'Building inspector',
            'Building services design',
            'Catering consultant',
            'Civil engineering design',
            'Cladding consultant',
            'Clerk of works',
            'Client advisor',
            'Client representative',
            'Comissioning engineer',
            'Comissioning specialist',
            'Consultant',
            'Consultants',
            'Contractor',
            'Demolition engineer',
            'Design lead',
            'Drainage engineer',
            'Ecologist',
            'Emergency services',
            "Employer's agent",
            'Energy consultant',
            'Environmental assessor',
            'Facilities management (FM) advisor',
            'Facilities manager',
            'Fire engineering consultant',
            'Health and safety consultant',
            'Highways consultant',
            'Information manager',
            'Interior designer',
            'Land surveyor',
            'Landscape designer',
            'Lighting designer',
            'Maintenance provider',
            'Master-planning consultant',
            'Network modeller',
            'Operation lead',
            'Party wall surveyor',
            'Planning consultant',
            'Principal designer',
            'Process engineer',
            'Procurement consultant',
            'Programmer lead',
            'Project manager',
            'Security consultant',
            'Signage designer',
            'Site investigation consultant',
            'Structural engineering design',
            'Survey specialist',
            'Sustainability consultant',
            'Technical consultant',
            'Traffic appraisal modeller',
            'Users',
            'Utility company',
        ];

        $id = 1;
        foreach ($agents as $agent) {
            DB::table('agents')->insertOrIgnore([
                [
                    'id' => $id,
                    'title' => $agent,
                    'is_custom' => false
                ]
            ]);            
            $id++;
        }
    }
}
