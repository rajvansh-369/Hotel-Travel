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
                "full_day_discount": 0,
                "full_discount_rate": 0,
                "sale_tax": 8,
                "full_day_start_time": "11:45:00",
                "full_day_end_time": "11:00:00",
                "min_hour": "2",
                "adult": "1",
                "child": "1",
                "advance_notice": "Capture the spritual energy and peacefulness of BODH GAYA from the stunning MAHA BODHI HOTEL RESORT & CONVENTION CENTRE .",
                "status": 1,
                "created_at": "2023-01-19T00:27:23.000000Z",
                "updated_at": "2023-01-24T08:09:26.000000Z"
                },
                {
                "id": 3,
                "user_id": 1,
                "name": "Hotel Sujata",
                "description": "Hotel Sujata takes pleasure to introduce itself as one of the reputed luxury hotel in Bodh Gaya. The Hotel is situated in Bodh Gaya Bihar in India.",
                "price_per_hour": 200,
                "price_per_day": 3600,
                "full_day_discount": 0,
                "full_discount_rate": 0,
                "sale_tax": 86,
                "full_day_start_time": "11:45:00",
                "full_day_end_time": "12:00:00",
                "min_hour": "2",
                "adult": "2",
                "child": "1",
                "advance_notice": "Hotel Sujata takes pleasure to introduce itself as one of the reputed luxury hotel in Bodh Gaya. The Hotel is situated in Bodh Gaya Bihar in India.",
                "status": 1,
                "created_at": "2023-01-19T00:49:12.000000Z",
                "updated_at": "2023-01-24T08:08:52.000000Z"
                },
                {
                "id": 4,
                "user_id": 1,
                "name": "Hotel Taj Darbar",
                "description": "Hotel TajDarbar is an abode of ideal stay set within the precincts of UNESCO-declared heritage city of Bodhgaya, which is the holiest place for Buddhists. At a distance of 8 kms. from Gaya Airport and 14 kms. from Railway station, ",
                "price_per_hour": 1599,
                "price_per_day": 1599,
                "full_day_discount": 1,
                "full_discount_rate": 12,
                "sale_tax": 8,
                "full_day_start_time": "11:45:00",
                "full_day_end_time": "12:00:00",
                "min_hour": "2",
                "adult": "3",
                "child": "2",
                "advance_notice": "Hotel TajDarbar is an abode of ideal stay set within the precincts of UNESCO-declared heritage city of Bodhgaya, which is the holiest place for Buddhists. At a distance of 8 kms. from Gaya Airport and 14 kms. from Railway station, ",
                "status": 1,
                "created_at": "2023-01-24T18:34:48.000000Z",
                "updated_at": "2023-01-24T18:34:48.000000Z"
                },
                {
                "id": 5,
                "user_id": 1,
                "name": "The Royal Residency",
                "description": "This lavish property makes for a relaxing stay option with its stylish rooms, a dining venue and easy connectivity to popular areas of the city.",
                "price_per_hour": 1500,
                "price_per_day": 1500,
                "full_day_discount": 1,
                "full_discount_rate": 15,
                "sale_tax": 8,
                "full_day_start_time": "11:45:00",
                "full_day_end_time": "12:00:00",
                "min_hour": "4",
                "adult": "2",
                "child": "1",
                "advance_notice": "Enjoy the propertys close proximity to Mahabodhi Temple which is 1.2 km away.\nEnjoy a refreshing walk in the propertys lush green garden.\nImmerse in a gourmet experience with a wide range of dishes at the on-site restaurant.",
                "status": 1,
                "created_at": "2023-01-24T18:40:52.000000Z",
                "updated_at": "2023-01-24T18:40:52.000000Z"
                },
                {
                "id": 6,
                "user_id": 1,
                "name": "The Royal Residency",
                "description": "This lavish property makes for a relaxing stay option with its stylish rooms, a dining venue and easy connectivity to popular areas of the city.",
                "price_per_hour": 1500,
                "price_per_day": 1500,
                "full_day_discount": 1,
                "full_discount_rate": 15,
                "sale_tax": 0,
                "full_day_start_time": "11:45:00",
                "full_day_end_time": "12:00:00",
                "min_hour": "2",
                "adult": "2",
                "child": "1",
                "advance_notice": "Enjoy the propertys close proximity to Mahabodhi Temple which is 1.2 km away.\nEnjoy a refreshing walk in the propertys lush green garden.\nImmerse in a gourmet experience with a wide range of dishes at the on-site restaurant.",
                "status": 1,
                "created_at": "2023-01-24T18:41:21.000000Z",
                "updated_at": "2023-01-24T18:41:21.000000Z"
                },
                {
                "id": 7,
                "user_id": 1,
                "name": "The Royal Residency",
                "description": "This lavish property makes for a relaxing stay option with its stylish rooms, a dining venue and easy connectivity to popular areas of the city.",
                "price_per_hour": 1500,
                "price_per_day": 1500,
                "full_day_discount": 1,
                "full_discount_rate": 15,
                "sale_tax": 8,
                "full_day_start_time": "11:45:00",
                "full_day_end_time": "12:00:00",
                "min_hour": "4",
                "adult": "2",
                "child": "1",
                "advance_notice": "Enjoy the propertys close proximity to Mahabodhi Temple which is 1.2 km away.\nEnjoy a refreshing walk in the propertys lush green garden.\nImmerse in a gourmet experience with a wide range of dishes at the on-site restaurant.",
                "status": 1,
                "created_at": "2023-01-24T18:41:57.000000Z",
                "updated_at": "2023-01-24T18:41:57.000000Z"
                }
                ]';
                $hotels = json_decode($hotel, true);
                

                $address = '[
                    {
                    "id": 2,
                    "listing_id": 2,
                    "formatted_address": "Village - Hariharpur Tekuna Farm - Gyan Bharti Road Hariharpur, Bodh Gaya 824231 India",
                    "postal_code": "824231 ",
                    "address": null,
                    "city": "Gaya",
                    "state": "Bihar",
                    "lat": "24.71271990700619",
                    "lng": "84.97432880026022",
                    "created_at": "2023-01-19T00:27:24.000000Z",
                    "updated_at": "2023-01-24T08:09:26.000000Z"
                    },
                    {
                    "id": 3,
                    "listing_id": 3,
                    "formatted_address": "Japanese Temple, Road, near Bhutan Temple, Mastipur, Bodh Gaya, Bihar 824231",
                    "postal_code": "824231",
                    "address": null,
                    "city": "Gaya",
                    "state": "Bihar",
                    "lat": "24.693266216351592",
                    "lng": "84.98543794219223",
                    "created_at": "2023-01-19T00:49:12.000000Z",
                    "updated_at": "2023-01-24T08:08:52.000000Z"
                    },
                    {
                    "id": 4,
                    "listing_id": 4,
                    "formatted_address": "Domuhan-Bodhgaya Rd, Bodh Gaya 824231 India",
                    "postal_code": "824231",
                    "address": null,
                    "city": "Gaya",
                    "state": "Bihar",
                    "lat": "24.696147520884917",
                    "lng": "84.9757388707162",
                    "created_at": "2023-01-24T18:34:48.000000Z",
                    "updated_at": "2023-01-24T18:34:48.000000Z"
                    },
                    {
                    "id": 5,
                    "listing_id": 5,
                    "formatted_address": "Domuhan-Bodhgaya Rd, Bodh Gaya, Bihar 824231",
                    "postal_code": "824231",
                    "address": null,
                    "city": "Gaya",
                    "state": "Bihar",
                    "lat": "24.696685116219452",
                    "lng": "84.97371414894042",
                    "created_at": "2023-01-24T18:40:53.000000Z",
                    "updated_at": "2023-01-24T18:40:53.000000Z"
                    },
                    {
                    "id": 6,
                    "listing_id": 6,
                    "formatted_address": "Domuhan-Bodhgaya Rd, Bodh Gaya, Bihar 824231",
                    "postal_code": "824231",
                    "address": null,
                    "city": "Gaya",
                    "state": "Bihar",
                    "lat": "24.696685116219452",
                    "lng": "84.97371414894042",
                    "created_at": "2023-01-24T18:41:21.000000Z",
                    "updated_at": "2023-01-24T18:41:21.000000Z"
                    },
                    {
                    "id": 7,
                    "listing_id": 7,
                    "formatted_address": "Domuhan-Bodhgaya Rd, Bodh Gaya, Bihar 824231",
                    "postal_code": "824231",
                    "address": null,
                    "city": "Gaya",
                    "state": "Bihar",
                    "lat": "24.696685116219452",
                    "lng": "84.97371414894042",
                    "created_at": "2023-01-24T18:41:57.000000Z",
                    "updated_at": "2023-01-24T18:41:57.000000Z"
                    }
                    ]';

                    $addresses = json_decode($address, true);
                    
                    
                    
                    
                    $picture = '[
                        {
                        "id": 1,
                        "listing_id": 2,
                        "picture": "picture/l5vIPGQlrD09XkRnIuP627AWkF6dlt-metacHJlc2lkZW50aWFsLXN1aXRlLmpwZw==-.jpg",
                        "picture_type": "main_picture",
                        "created_at": "2023-01-19T01:54:13.000000Z",
                        "updated_at": "2023-01-19T01:54:13.000000Z"
                        },
                        {
                        "id": 2,
                        "listing_id": 2,
                        "picture": "picture/nDliSWIhDH56ZARaa1fgVGlThy2f0U-metaZ3JhbmQtbG9iYnkuanBn-.jpg",
                        "picture_type": "rest_image",
                        "created_at": "2023-01-19T01:54:13.000000Z",
                        "updated_at": "2023-01-19T01:54:13.000000Z"
                        },
                        {
                        "id": 3,
                        "listing_id": 2,
                        "picture": "picture/iPolJ1XXXH6SFkIt2WCvvjiYrbAF6M-metabWFoYS1ib2RoaS1ob3RlbC1yZXNvcnQgKDEpLmpwZw==-.jpg",
                        "picture_type": "rest_image",
                        "created_at": "2023-01-19T01:54:13.000000Z",
                        "updated_at": "2023-01-19T01:54:13.000000Z"
                        },
                        {
                        "id": 4,
                        "listing_id": 2,
                        "picture": "picture/SybzI3ZfypAsyyfFzrxHwcNe08zH4e-metabW9oaW5pLXRoZS1zcGEuanBn-.jpg",
                        "picture_type": "rest_image",
                        "created_at": "2023-01-19T01:54:13.000000Z",
                        "updated_at": "2023-01-19T01:54:13.000000Z"
                        },
                        {
                        "id": 5,
                        "listing_id": 3,
                        "picture": "picture/0D5Y3DeBnvo8MakPrmCTeJQmFMrz8H-metabWFpbi5qcGVn-.jpg",
                        "picture_type": "main_picture",
                        "created_at": "2023-01-19T01:54:33.000000Z",
                        "updated_at": "2023-01-19T01:54:33.000000Z"
                        },
                        {
                        "id": 6,
                        "listing_id": 4,
                        "picture": "picture/WgowHgxexfFjwnylmlspeoJBQS4C94-metabWFpbi5qcGc=-.jpg",
                        "picture_type": "main_picture",
                        "created_at": "2023-01-24T18:34:48.000000Z",
                        "updated_at": "2023-01-24T18:34:48.000000Z"
                        },
                        {
                        "id": 7,
                        "listing_id": 4,
                        "picture": "picture/s5Xgf4JsJpPXv4RLESHLM5ZWoWHMzT-metaMS5qcGVn-.jpg",
                        "picture_type": "rest_image",
                        "created_at": "2023-01-24T18:34:48.000000Z",
                        "updated_at": "2023-01-24T18:34:48.000000Z"
                        },
                        {
                        "id": 8,
                        "listing_id": 4,
                        "picture": "picture/smu6U89Np4uH2YZfjBtEwoulg2y6fb-metaMi5qcGVn-.jpg",
                        "picture_type": "rest_image",
                        "created_at": "2023-01-24T18:34:48.000000Z",
                        "updated_at": "2023-01-24T18:34:48.000000Z"
                        },
                        {
                        "id": 9,
                        "listing_id": 4,
                        "picture": "picture/Tvff9FDDjPdfntiswG9mcUEHbDhg70-metaMy5qcGVn-.jpg",
                        "picture_type": "rest_image",
                        "created_at": "2023-01-24T18:34:48.000000Z",
                        "updated_at": "2023-01-24T18:34:48.000000Z"
                        },
                        {
                        "id": 10,
                        "listing_id": 4,
                        "picture": "picture/BPqCbKj0F1BLpfY8IBai9dnRmly3q5-metaNC5qcGVn-.jpg",
                        "picture_type": "rest_image",
                        "created_at": "2023-01-24T18:34:48.000000Z",
                        "updated_at": "2023-01-24T18:34:48.000000Z"
                        },
                        {
                        "id": 11,
                        "listing_id": 5,
                        "picture": "picture/mzrMLaN6COS055rks5LEZXi514SYui-metaMTMwMDk2MjM0LmpwZw==-.jpg",
                        "picture_type": "main_picture",
                        "created_at": "2023-01-24T18:40:53.000000Z",
                        "updated_at": "2023-01-24T18:40:53.000000Z"
                        },
                        {
                        "id": 12,
                        "listing_id": 7,
                        "picture": "picture/4YoudSJUmMMOyFldp11Qw2h6Rqj5Ey-metaMTMwMDk2MjM0LmpwZw==-.jpg",
                        "picture_type": "main_picture",
                        "created_at": "2023-01-24T18:41:57.000000Z",
                        "updated_at": "2023-01-24T18:41:57.000000Z"
                        },
                        {
                        "id": 13,
                        "listing_id": 7,
                        "picture": "picture/wGXiFcBlc4aI5zU5to3auWbjWFSrAR-metaMi5qcGVn-.jpg",
                        "picture_type": "rest_image",
                        "created_at": "2023-01-24T18:41:57.000000Z",
                        "updated_at": "2023-01-24T18:41:57.000000Z"
                        },
                        {
                        "id": 14,
                        "listing_id": 7,
                        "picture": "picture/fAe5QBlQzivsPLik4RcS09Jfu2fgBQ-metaMy5qcGVn-.jpg",
                        "picture_type": "rest_image",
                        "created_at": "2023-01-24T18:41:57.000000Z",
                        "updated_at": "2023-01-24T18:41:57.000000Z"
                        },
                        {
                        "id": 15,
                        "listing_id": 7,
                        "picture": "picture/fHxSG63TItR78lDkASuaWjjBsmsAqY-metaNC5qcGVn-.jpg",
                        "picture_type": "rest_image",
                        "created_at": "2023-01-24T18:41:57.000000Z",
                        "updated_at": "2023-01-24T18:41:57.000000Z"
                        },
                        {
                        "id": 16,
                        "listing_id": 6,
                        "picture": "picture/mzrMLaN6COS055rks5LEZXi514SYui-metaMTMwMDk2MjM0LmpwZw==-.jpg",
                        "picture_type": "main_picture",
                        "created_at": "2023-01-24T18:40:53.000000Z",
                        "updated_at": "2023-01-24T18:40:53.000000Z"
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
