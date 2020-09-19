<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Client;
use App\Models\Folder;
use App\Models\Gallary;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Support\Str;


class ClientFileController extends Controller
{
    //

    public $viewPath;

    public function __construct()
    {
        $this->viewPath = 'frontend';
    }

    public function folderLists($clientId, $addressId)
    {

        $clientId = Hashids::decode($clientId)[0];
        $folders = Folder::where('client_id', $clientId)->where('address_id', $addressId)->get();
        $client = Client::find($clientId);
        $singleAddressArr = [];
        if ($client) {
            $workAddressArr = $workAddressArr = json_decode($client->work_address, true);
            foreach ($workAddressArr as $data) {
                if($data['id'] == $addressId) {
                    $singleAddressArr =  $data;
                }
            }
        }
        $data['client_id'] = $clientId;
        $data['address_id'] = $addressId;
        $data['folders'] = $folders;
        $data['single_address'] = $singleAddressArr;
        $data['client'] = $client;
        return view($this->viewPath . '/client_folder/list', compact('data'));
    }

    /**
     * @param Request $request
     * @return array
     */
    public function createFolder(Request $request)
    {

        $folderName = $request->name . '_' . $request->clientId . '_' . $request->addressId;
        $folerPath = public_path('uploads/folders/' . $folderName);
        try {
            $folder = Folder::where('name', $request->name)->first();
            if (!$folder) {
                File::makeDirectory($folerPath);
                $folderObj = new Folder();
                $folderObj->name = $folderName;
                $folderObj->title = $request->title;
                $folderObj->client_id = $request->clientId;;
                $folderObj->address_id = $request->addressId;
                $folderObj->save();
                return ['status' => true, 'message' => 'Folder has been created successfully', 'data' => $folderObj];
            } else {
                return ['status' => false, 'message' => 'Folder already exists', 'data' => []];
            }

        } catch (\Exception $e) {
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }


    public function folderFiles(Request $request)
    {

        $files = Gallery::where('folder_id', $request->folder_id)->get();
        return ['status' => true, 'data' => $files];
    }

    public function uploadFiles(Request $request)
    {

        $folder = Folder::where('id', $request->folder_id)->first();

        $input['folder_id'] = $request->folder_id;

        if ($request->has('file')) {
            $destinationPath = public_path('uploads/folders/') . $folder->name;
            $image = $request->file('file');
            $orginalName = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $fileName = Str::random(5) . '_' . $orginalName;
            $image->move($destinationPath, $fileName);
            $file = $fileName;
            $gallary = new Gallery();
            $gallary->file = $file;
            $gallary->folder_id = $request->folder_id;
            $gallary->type = 'image';
            $gallary->name = ucwords($folder->name);
            $gallary->save();
            $allFiles = Gallery::where('folder_id', $request->folder_id)->get();
            return ['status' => true, 'message' => 'File has been uploaded', 'data' => $allFiles];
        } else {
            return ['status' => false, 'message' => 'Error uploading file', 'data' => []];
        }


    }

    public function deleteFile($id)
    {

        try {
            $gallary = Gallery::find($id);
            if ($gallary) {
                $fileName = public_path('uploads/folders/') . $gallary->name . '/' . $gallary->file;
                File::delete($fileName);
                $gallary->delete();
                return ['status' => true, 'message' => 'File has been delete successfully'];
            }
        } catch (\Exception $e) {
            return ['status' => false, 'message' => $e->getMessage()];
        }

    }


    public function deleteFolder(Request $request)
    {

        try {
            $allData = Folder::with('files')->where('id', $request->folder_id)->first();
            $folderPath = public_path('uploads/folders/') . $allData->name;
            File::deleteDirectory($folderPath);
            Gallery::where('folder_id', $allData->id)->delete();
            Folder::where('id', $request->folder_id)->delete();
            $allFolders = Folder::where('client_id', $request->client_id)->where('address_id', $request->address_id)->get();
            return [
                'status' => true, 'message' => 'folder has been delete successfully', 'data' => $allFolders
            ];
        } catch (\Exception $e) {
            return ['status' => false, 'message' => 'Error in delete folder'];
        }
    }


    public function saveNote(Request $request)
    {

        $note = new Gallery();
        $note->note = $request->note;
        $note->folder_id = $request->folder_id;
        $note->type = 'note';
        $note->name = '';
        $note->save();
        $allFiles = $this->getAllfiles($request->folder_id);
        return [
            'status' => true, 'message' => 'Note has been saved successfully', 'data' => $allFiles
        ];
    }


    public function updateNote(Request $request){

        $noteObj = Gallery::find($request->id);
        if ($noteObj) {
            $noteObj->note = $request->note;
            $noteObj->save();

        }
        $allFiles = $this->getAllfiles($request->folder_id);
        return [
            'status' => true, 'message' => 'Note has been update successfully', 'data' => $allFiles
        ];
    }


    public function getNote($id){

        return
            ['data' => Gallery::where('id',$id)->first() ];
    }


    public function getAllfiles($id)
    {
        return $allFiles = Gallery::where('folder_id', $id)->get();
    }


    public function getFolderLists(Request $request){
        return  [
          'data' => Folder::where('client_id', $request->client_id)->where('address_id', $request->address_id)->get()
        ];
    }


}