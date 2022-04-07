<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AppBaseController;
use App\Models\Favourite;
use App\Models\Property;
use App\Models\RecentVisited;
use Illuminate\Http\Request;

class PropertyController extends AppBaseController
{

    public function getAllAutocomplete(Request $request)
    {
        $key = $request->input('key');
        $response = Property::where('Ml_num', 'LIKE', "{$key}%")
            ->orWhere('addr', 'LIKE', "{$key}%")
            ->select('Ml_num', 'addr')
            ->get();

        dd("PPP");

        $msg = 'Autocomplete fetched successfully.';
        return $this->sendResponse($msg, $response);
    }

    // For card data
    public function getProperties(Request $request)
    {

        $addrr = $request->input('property-location');
        $msg = 'Property fetched successfully.';
        $response = Property::has('image')
            ->with('images')
            ->where('Municipality', 'LIKE', "%{$addrr}%")
            ->orderby('id', 'DESC')
            ->paginate('9');
        return $this->sendResponse($msg, $response);
    }

    // Only for full details
    public function getDetails(Request $request)
    {
        $Ml_num = $request->input('id');
        $msg = 'Property details fetched successfully.';
        $response = Property::with('images')->where(['Ml_num' => $Ml_num])->get();
        return $this->sendResponse($msg, $response);
    }

    // Search for card
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

        // Condition of Zoning and Type = $propType
        $propTypeKey = '';
        $propTypeValue = '';
        $propZoningKey = '';
        $propZoningValue = '';
        if ($propType) {
            $ty = explode("=", $propType);
            if ($ty[0] == 'type') {
                $propTypeKey = $ty[0];
                $propTypeValue = $ty[1];
            }
            if ($ty[0] == 'zonig') {
                $propZoningKey = $ty[0];
                $propZoningValue = $ty[1];
            }
        }

        $msg = 'Property fetched successfully.';

        // select * from `properties` where `Br` >= ? and `Lp_dol` >= ? and `Lp_dol` <= ? and `S_r` = ? and `property_type` LIKE ? and `Bath_tot` >= ? and `Patio_ter` not in (?, ?, ?) and `Idx_dt` <= ? and `Ad_text` LIKE ? and `Addr` LIKE ? or (`Ml_num` LIKE ?) or (`Municipality_district` LIKE ?) or (`Municipality` LIKE ?) or (`Community` LIKE ?) and `Sqft` >= ? order by `id` desc
        $response = Property::with('images')


            // Bed Rooms -- done
            ->when($bedRoom, function ($query) use ($data) {
                $br = (int) $data['bedRoom'];
                return $query->where('Br', '>=', $br);
            })

            // Min Price - done
            ->when($min_price, function ($query) use ($data) {
                $minp = (float) $data['minPrice'];
                return $query->where('Lp_dol', '>=', $minp);
            })

            // Max Price - Done
            ->when($max_price, function ($query) use ($data) {
                $mxp = (float) $data['maxPrice'];
                return $query->where('Lp_dol', '<=', $mxp);
            })

            // Listed for - Rent or sell - done
            ->when($listedFor, function ($query) use ($data) {
                $S_r = $data['listedFor'];
                return $query->where('S_r', $S_r);
            })

            // Property type - Done
            ->when($propTypeKey, function ($query) use ($propTypeValue) {
                return $query->where('property_type', 'LIKE', "%{$propTypeValue}%");
            })

            // Zoning type - Done
            ->when($propZoningKey, function ($query) use ($propZoningValue) {
                return $query->where('Zoning', 'LIKE', "%{$propZoningValue}%");
            })

            // bath - Done
            ->when($bath, function ($query) use ($data) {
                $bath = (int) $data['bath'];
                return $query->where('Bath_tot', '>=', $bath);
            })

            // openHouse - Done
            ->when($openHouse, function ($query) use ($data) {
                $openHouse_ = [NULL, 'None', ''];
                return $query->whereNotIn('Patio_ter', $openHouse_);
            })

            // addedFrom -- Idx_dt - Done
            ->when($addedFrom, function ($query) use ($data) {
                $addedFrom_ = $data['addedFrom'];
                return $query->where('Idx_dt', '<=', $addedFrom_);
            })

            // key - Done
            ->when($key, function ($query) use ($data) {
                $key_ = $data['key'];
                return $query->where('Ad_text', 'LIKE', "%{$key_}%");
            })

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
            ->select(
                'id',
                'Ml_num',
                'Addr',
                'Ad_text',
                'S_r',
                'Lp_dol',
                'Rltr',
                'updated_at',
                'Bath_tot',
                'Br',
                'Br_plus'
            )
            ->orderby('id', 'DESC')
            // ->toSql();
            ->paginate('15')->withQueryString();

        // $response = $request->all();
        return $this->sendResponse($msg, $response);
    }

    // Search for card
    public function searchProperty_BCUP(Request $request)
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

        // Condition of Zoning and Type = $propType
        $propTypeKey = '';
        $propTypeValue = '';
        $propZoningKey = '';
        $propZoningValue = '';
        if ($propType) {
            $ty = explode("=", $propType);
            if ($ty[0] == 'type') {
                $propTypeKey = $ty[0];
                $propTypeValue = $ty[1];
            }
            if ($ty[0] == 'zonig') {
                $propZoningKey = $ty[0];
                $propZoningValue = $ty[1];
            }
        }

        $msg = 'Property fetched successfully.';

        $response = Property::with('images')

            // select * from `properties` where `Br` >= ? and `Lp_dol` >= ? and `Lp_dol` <= ? and `S_r` = ? and `property_type` LIKE ? and `Bath_tot` >= ? and `Patio_ter` not in (?, ?, ?) and `Idx_dt` <= ? and `Ad_text` LIKE ? and `Addr` LIKE ? or (`Ml_num` LIKE ?) or (`Municipality_district` LIKE ?) or (`Municipality` LIKE ?) or (`Community` LIKE ?) and `Sqft` >= ? order by `id` desc

            // Bed Rooms -- done
            ->when($bedRoom, function ($query) use ($data) {
                $br = (int) $data['bedRoom'];
                return $query->where('Br', '>=', $br);
            })

            // Min Price - done
            ->when($min_price, function ($query) use ($data) {
                $minp = (float) $data['minPrice'];
                return $query->where('Lp_dol', '>=', $minp);
            })

            // Max Price - Done
            ->when($max_price, function ($query) use ($data) {
                $mxp = (float) $data['maxPrice'];
                return $query->where('Lp_dol', '<=', $mxp);
            })

            // Listed for - Rent or sell - done
            ->when($listedFor, function ($query) use ($data) {
                $S_r = $data['listedFor'];
                return $query->where('S_r', $S_r);
            })

            // Property type - Done
            ->when($propTypeKey, function ($query) use ($propTypeValue) {
                return $query->where('property_type', 'LIKE', "%{$propTypeValue}%");
            })

            // Zoning type - Done
            ->when($propZoningKey, function ($query) use ($propZoningValue) {
                return $query->where('Zoning', 'LIKE', "%{$propZoningValue}%");
            })

            // bath - Done
            ->when($bath, function ($query) use ($data) {
                $bath = (int) $data['bath'];
                return $query->where('Bath_tot', '>=', $bath);
            })

            // openHouse - Done
            ->when($openHouse, function ($query) use ($data) {
                $openHouse_ = [NULL, 'None', ''];
                return $query->whereNotIn('Patio_ter', $openHouse_);
            })

            // addedFrom -- Idx_dt - Done
            ->when($addedFrom, function ($query) use ($data) {
                $addedFrom_ = $data['addedFrom'];
                return $query->where('Idx_dt', '<=', $addedFrom_);
            })

            // key - Done
            ->when($key, function ($query) use ($data) {
                $key_ = $data['key'];
                return $query->where('Ad_text', 'LIKE', "%{$key_}%");
            })

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

    // saveFavourite
    public function saveFavourite(Request $request)
    {

        $userId = auth()->user()->id;

        $data = [
            'user_id' => $userId,
            'ml_num' => $request->ml_num
        ];

        $exists = Favourite::where($data)->exists();

        if ($exists) {
            Favourite::where($data)->delete();
            return $this->sendResponse("Removed from your favourite list.", ['action' => 'removed', 'ml_num' => $request->ml_num]);
        }

        Favourite::create($data);
        return $this->sendResponse("Added to your favourite list.", ['action' => 'added', 'ml_num' => $request->ml_num]);
    }

    // saveRecent
    public function saveRecent(Request $request)
    {
        $userId = auth()->user()->id;
        $data = [
            'user_id' => $userId,
            'ml_num' => $request->ml_num
        ];
        $exists = RecentVisited::where($data)->exists();
        if ($exists) {
            RecentVisited::where($data)->delete();
        }
        RecentVisited::create($data);
        return $this->sendResponse("Added to your recent list.", ['action' => 'added recent', 'ml_num' => $request->ml_num]);
    }

    // for card only
    public function getFavourite(Request $request)
    {
        // return $this->sendResponse('Bookmark Property successfully', []);
        $userId = auth()->user()->id;
        $f_id =  Favourite::where(['user_id' => $userId])->get('ml_num');
        // echo count($f_id);
        $response = Property::whereIn('ml_num', $f_id)->with('images')->select(
            'id',
            'Ml_num',
            'Addr',
            'Ad_text',
            'S_r',
            'Lp_dol',
            'Rltr',
            'updated_at',
            'Bath_tot',
            'Br',
            'Br_plus'
        )->orderby('id', 'DESC')->paginate('3');
        return $this->sendResponse('Bookmark Property successfully', $response);
    }

    // For cards only
    public function getRecent(Request $request)
    {
        $f_id = $request->ml_num;
        // echo count($f_id);
        $response = Property::whereIn('ml_num', $f_id)->with('images')->select(
            'id',
            'Ml_num',
            'Addr',
            'Ad_text',
            'S_r',
            'Lp_dol',
            'Rltr',
            'updated_at',
            'Bath_tot',
            'Br',
            'Br_plus'
        )->orderby('id', 'DESC')->paginate('3');
        return $this->sendResponse('Bookmark Property successfully', $response);
    }
}
