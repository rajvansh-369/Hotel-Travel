<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Listing;
use App\Models\Picture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
            $hotel = '[
                {
                "id": 2,
                "user_id": 1,
                "name": "Maha Bodhi",
                "description": "Capture the spritual energy and peacefulness of BODH GAYA from the stunning MAHA BODHI HOTEL RESORT & CONVENTION CENTRE .",
                "price_per_hour": 700,
                "price_per_day": 2499,
                "half_day_discount": 0,
                "half_discount_rate": 0,
                "full_day_discount": 0,
                "full_discount_rate": 0,
                "sale_tax": 8,
                "full_day_start_time": "11:45:00",
                "full_day_end_time": "11:00:00",
                "min_hour": "2",
                "advance_notice": "Capture the spritual energy and peacefulness of BODH GAYA from the stunning MAHA BODHI HOTEL RESORT & CONVENTION CENTRE .",
                "status": 1,
                "created_at": "2023-01-19T05:57:23.000000Z",
                "updated_at": "2023-01-19T06:07:20.000000Z"
                },
                {
                "id": 3,
                "user_id": 1,
                "name": "Hotel Sujata",
                "description": "Hotel Sujata takes pleasure to introduce itself as one of the reputed luxury hotel in Bodh Gaya. The Hotel is situated in Bodh Gaya Bihar in India.",
                "price_per_hour": 200,
                "price_per_day": 3600,
                "half_day_discount": 0,
                "half_discount_rate": 0,
                "full_day_discount": 0,
                "full_discount_rate": 0,
                "sale_tax": 86,
                "full_day_start_time": "11:45:00",
                "full_day_end_time": "12:00:00",
                "min_hour": "2",
                "advance_notice": "Hotel Sujata takes pleasure to introduce itself as one of the reputed luxury hotel in Bodh Gaya. The Hotel is situated in Bodh Gaya Bihar in India.",
                "status": 1,
                "created_at": "2023-01-19T06:19:12.000000Z",
                "updated_at": "2023-01-19T06:19:12.000000Z"
                }
                ]';
                $hotels = json_decode($hotel, true);
                

                $address = '[
                    {
                    "id": 2,
                    "listing_id": 2,
                    "formatted_address": "Village - Hariharpur Tekuna Farm - Gyan Bharti Road Hariharpur, Bodh Gaya 824231 India",
                    "postal_code": "824231 ",
                    "address": "Hariharpur Tekuna Farm",
                    "city": "Gaya",
                    "state": "Bihar",
                    "lat": "24.700270",
                    "lng": "84.990890",
                    "created_at": "2023-01-19T05:57:24.000000Z",
                    "updated_at": "2023-01-19T06:07:20.000000Z"
                    },
                    {
                    "id": 3,
                    "listing_id": 3,
                    "formatted_address": "Japanese Temple, Road, near Bhutan Temple, Mastipur, Bodh Gaya, Bihar 824231",
                    "postal_code": "824231",
                    "address": "Japanese Temple, Road, near Bhutan Temple,",
                    "city": "Gaya",
                    "state": "Bihar",
                    "lat": "25.700270",
                    "lng": "85.990890",
                    "created_at": "2023-01-19T06:19:12.000000Z",
                    "updated_at": "2023-01-19T06:19:12.000000Z"
                    }
                    ]';

                    $addresses = json_decode($address, true);
                    
                    
                    
                    
                    $picture = '[
                        {
                        "id": 1,
                        "listing_id": 2,
                        "picture": "picture/l5vIPGQlrD09XkRnIuP627AWkF6dlt-metacHJlc2lkZW50aWFsLXN1aXRlLmpwZw==-.jpg",
                        "picture_type": "main_picture",
                        "created_at": "2023-01-19T07:24:13.000000Z",
                        "updated_at": "2023-01-19T07:24:13.000000Z"
                        },
                        {
                        "id": 2,
                        "listing_id": 2,
                        "picture": "picture/nDliSWIhDH56ZARaa1fgVGlThy2f0U-metaZ3JhbmQtbG9iYnkuanBn-.jpg",
                        "picture_type": "rest_image",
                        "created_at": "2023-01-19T07:24:13.000000Z",
                        "updated_at": "2023-01-19T07:24:13.000000Z"
                        },
                        {
                        "id": 3,
                        "listing_id": 2,
                        "picture": "picture/iPolJ1XXXH6SFkIt2WCvvjiYrbAF6M-metabWFoYS1ib2RoaS1ob3RlbC1yZXNvcnQgKDEpLmpwZw==-.jpg",
                        "picture_type": "rest_image",
                        "created_at": "2023-01-19T07:24:13.000000Z",
                        "updated_at": "2023-01-19T07:24:13.000000Z"
                        },
                        {
                        "id": 4,
                        "listing_id": 2,
                        "picture": "picture/SybzI3ZfypAsyyfFzrxHwcNe08zH4e-metabW9oaW5pLXRoZS1zcGEuanBn-.jpg",
                        "picture_type": "rest_image",
                        "created_at": "2023-01-19T07:24:13.000000Z",
                        "updated_at": "2023-01-19T07:24:13.000000Z"
                        },
                        {
                        "id": 5,
                        "listing_id": 3,
                        "picture": "picture/0D5Y3DeBnvo8MakPrmCTeJQmFMrz8H-metabWFpbi5qcGVn-.jpg",
                        "picture_type": "main_picture",
                        "created_at": "2023-01-19T07:24:33.000000Z",
                        "updated_at": "2023-01-19T07:24:33.000000Z"
                        }
                        ]';
                    
                    
                    
                    
                    
                    
                    
                    
                    $pictures = json_decode($picture, true);

 
                foreach($hotels as $hotel){

                    Listing::create($hotel);
                }

                foreach($addresses as $address){

                    Address::create($address);
                }
                foreach($pictures as $picture){

                    Picture::create($picture);
                }
    }
}
