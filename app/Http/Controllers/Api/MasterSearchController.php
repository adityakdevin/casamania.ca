<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Property;

class MasterSearchController extends AppBaseController
{

    // Master search using key:
    public function search(Request $request)
    {
        $isFound = false;

        $key = $request->key;

        // Search in list max 5 
        $list = Property::where('property_type', 'LIKE', "{$key}%")
            ->orWhere('S_r', 'LIKE', "%{$key}%")
            ->orWhere('Ad_text', 'LIKE', "%{$key}%")
            ->orWhere('Addr', 'LIKE', "%{$key}%")
            ->orWhere('Ml_num', 'LIKE', "%{$key}%")
            // ->orWhere('Municipality_district', 'LIKE', "%{$key}%")
            // ->orWhere('Municipality', 'LIKE', "%{$key}%")
            // ->orWhere('Community', 'LIKE', "%{$key}%")
            ->orderby('id', 'DESC')
            ->take(5)
            ->get();


        // Search in location max 5
        $loc = Property::Where('Addr', 'LIKE', "%{$key}%")
            ->orWhere('Municipality_district', 'LIKE', "{$key}%")
            ->orWhere('Municipality', 'LIKE', "{$key}%")
            ->orWhere('Community', 'LIKE', "{$key}%")
            ->orderby('id', 'DESC')
            ->take(5)
            ->get();


        $pages = [
            [
                'key' => 'about, about us, team, our team',
                'url' => '/about-us',
                'title' => 'About Us'
            ],
            [
                'key' => 'contact, contact us, send message, email, location, map, google map',
                'url' => '/contact-us',
                'title' => 'Contact Us'
            ],
            [
                'key' => 'TERMS OF SERVICE, teams and conditions, Disclaimer, MILLENNIUM REAL ESTATE Brokerage',
                'url' => '/terms-of-use',
                'title' => 'TERMS OF SERVICE'
            ],
            [
                'key' => 'PRIVACY POLICY, Personal Information, Information Collection and Use, Home Worth / Dream Home / Neighbourhood Buzzer / Free Real Estate Reports',
                'url' => '/privacy-policy',
                'title' => 'PRIVACY POLICY'
            ],
            [
                'key' => 'All Property Listings, properties, list',
                'url' => '/property/search',
                'title' => 'All Properties'
            ],
            [
                'key' => 'Blog, posts, our posts, news, related',
                'url' => '/blog',
                'title' => 'Blog'
            ],
            [
                'key' => 'Bookmarked Properties, saved Properties',
                'url' => '/dashboard/bookmarks',
                'title' => 'Bookmarked'
            ],
            [
                'key' => 'notifications, replies, new',
                'url' => '/dashboard/notifications',
                'title' => 'notifications'
            ],
            [
                'key' => 'Recent Visited Properties',
                'url' => '/dashboard/recent-visited',
                'title' => 'Recently Visited'
            ],
            [
                'key' => 'User Profile, My Profile, update password, change password, my informaion, dashboard',
                'url' => '/dashboard/my-account',
                'title' => 'User Profile'
            ]
        ];

        $pageLink = [];

        $fk = strtolower($key);
        foreach ($pages as $page) {
            $k = strtolower($page['key']);
            if (strpos($k, $fk) !== false) {
                $pageLink[] = $page;
            }
        }

        if (count($loc) > 0 || count($list) > 0 || count($pageLink) > 0) {
            $isFound = true;
        }

        $data = [
            'dataFound' => $isFound, //false
            'location' => $loc,
            'listing' => $list,
            'pages' => $pageLink,
        ];

        return $this->sendResponse('Your query has been saved. We will contact you very soon.', $data);
    }



    public function searchProperty(Request $request)
    {

        $data = $request->all();

        // vars
        $bedRoom = !empty($data['bedRoom']) ? (int) $data['bedRoom'] : '';
        $min_price = !empty($data['minPrice']) ? (int) $data['minPrice'] : '';
        $max_price = !empty($data['maxPrice']) ? (int) $data['maxPrice'] : '';
        $listedFor = !empty($data['listedFor']) ? $data['listedFor'] : '';
        $propType = !empty($data['propertyType']) ? $data['propertyType'] : '';
        $bath = !empty($data['bath']) ? (int) $data['bath'] : '';
        $openHouse = !empty($data['openHouse']) ? (bool) $data['openHouse'] : '';
        $addedFrom =  !empty($data['addedFrom']) ? $data['addedFrom'] : '';
        $key = !empty($data['key']) ? $data['key'] : '';
        $addr = !empty($data['addr']) ? $data['addr'] : '';

        $Sqft = !empty($data['sqft']) ? (int) $data['sqft'] : '';

        $msg = 'Property fetched successfully.';

        $response = Property::with('images')

            // sqft - working
            ->when($Sqft, function ($query) use ($data) {
                $Sqft_ = (int) $data['sqft'];
                return $query->whereRaw('CAST(Sqft AS UNSIGNED) >= ' . $Sqft_);
            })

            // Addr - Done
            ->when($addr, function ($query) use ($data) {

                $addrr = $data['addr'];

                $id = Property::where('Addr', 'LIKE', "%{$addrr}%")
                    ->orWhere(function ($query) use ($addrr) {
                        $query->where('Ml_num', 'LIKE', "%{$addrr}%");
                    })
                    ->orWhere(function ($query) use ($addrr) {
                        $query->where('Municipality_district', 'LIKE', "{$addrr}%");
                    })
                    ->orWhere(function ($query) use ($addrr) {
                        $query->where('Municipality', 'LIKE', "{$addrr}%");
                    })
                    ->orWhere(function ($query) use ($addrr) {
                        $query->where('Community', 'LIKE', "{$addrr}%");
                    })
                    ->select('id')->get();

                return $query->whereIn('id', $id);
            })

            ->orderby('id', 'DESC')
            // ->toSql();
            ->paginate('15')->withQueryString();

        // $response = $request->all();
        return $this->sendResponse($msg, $response);
    }
}
