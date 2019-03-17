<?php
/**
 * Created by PhpStorm.
 * User: Veronika Gjoreva
 * Date: 07/02/2019
 * Time: 23:35
 */

namespace App\Http\Controllers;
use App\InstrumentsInfo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as Controller;
use App\InstrumentsFamily;
use Inacho\CreditCard;

class UploadController extends Controller
{

    public function create()
    {

        $family = InstrumentsFamily::all();

        return view('upload', ['family' => $family]);
    }

    public function upload(Request $request)
    {

        $request->validate([
            'name' => 'required | unique:instruments_info',
            'details' => 'required',
            'price' => 'required | numeric',
            'in_store' => 'required | numeric',
            'files' => 'required'
        ]);

        $datetime = explode('-', $request->get('expiration_date'));
        $card = $request->card_number;

        if(CreditCard::validCreditCard($card)['valid'] == 0)
            return back()->with('warning', 'Invalid credit card number!');
        else if(!CreditCard::validCvc($request->cvc, CreditCard::validCreditCard($card)['type']))
            return back()->with('warning', 'Invalid CVC!');
        else if(CreditCard::validDate($datetime[0], $datetime[1]) == false)
            return back()->with('warning', 'Expired card!');

        $nameOfFolder = $request->name;
       // $flag = true;


        if($request->hasFile('files')) {

            if(sizeof($request->file('files')) < 4){
                return back()->with('success', 'Minimum 4 files are required!');
            }
            else{
                foreach ($request->file('files') as $file) {

                    $filename = $file->getClientOriginalName();

                    $name_temp = explode('.', $filename);

                    $extension = $name_temp[1];

                    if ($extension == 'gltf') {
                        $file->move(public_path('/models/' . $nameOfFolder), 'scene.gltf');
                    } else if ($extension == 'bin') {
                        $file->move(public_path('/models/' . $nameOfFolder), 'scene.bin');
                    } else if ($filename == 'img.png') {

                        $file->move(public_path('/models/' . $nameOfFolder), $filename);
                    } else {
                        $file->move(public_path('/models/' . $nameOfFolder . '/textures'), $filename);
                    }

                }
            }
        }


        $instrument = new InstrumentsInfo;

        $instrument->id = \Webpatser\Uuid\Uuid::generate()->string;
        $instrument->name = $request->name;
        $instrument->credit_card_number = base64_encode($request->card_number);
        $instrument->details = $request->details;
        $instrument->price = $request->price;
        $instrument->in_store = $request->in_store;
        $instrument->instrument_family = $request->instrument_family;
        $instrument->created_at = now();
        $instrument->updated_at = now();
        $instrument->object = 'models/'.$nameOfFolder.'/scene.gltf';
        $instrument->preview ='models/'.$nameOfFolder.'/img.png';

        $instrument->save();

        $instrumentIndes = InstrumentsInfo::where('name', $request->name)->first();

        return redirect('/catalogue/'.$request->instrument_family.'/instruments/'.$instrumentIndes->id);
    }

}