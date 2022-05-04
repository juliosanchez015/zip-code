<?php

namespace Database\Seeders;

use App\Models\FederalEntity;
use App\Models\Municipality;
use App\Models\Settlement;
use App\Models\SettlementType;
use App\Models\ZipCode;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ZipCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Municipality::truncate();
        FederalEntity::truncate();
        ZipCode::truncate();
        Settlement::truncate();
        SettlementType::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $csvFile = fopen(storage_path("database/data/sepomex_abril-2016.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 200000, ",")) !== FALSE) {
            if (!$firstline) {
                $federalEntity = FederalEntity::firstOrCreate([
                    "key"=>trim($data['0']),
                    "name"=>trim($data['1']),
                ]);
                $municipality  = Municipality::firstOrCreate([
                    "key"=>trim($data['2']),
                    "name"=>trim($data['3']),
                ]);
                $settlementType  = SettlementType::firstOrCreate([
                    "name"=>trim($data['8']),
                ]);
                $zipCode = ZipCode::firstOrCreate([
                    "federal_entity_id" => $federalEntity->id,
                    "municipality_id" => $municipality->id,
                    "zip_code" => trim($data['6']),
                ]);
                if(trim($data['4'])!=="NULL"){
                    $zipCode->locality = trim($data['4']);
                    $zipCode->save();
                }
                Settlement::create([
                    "name"=> trim($data['7']),
                    "zone_type"=> trim($data['5']),
                    "settlement_type_id"=> $settlementType->id,
                    "zip_code_id"=> $zipCode->id,
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
