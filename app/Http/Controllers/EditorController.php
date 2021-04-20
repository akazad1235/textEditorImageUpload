<?php

namespace App\Http\Controllers;

use App\Models\Editor;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allData =  Editor::all();
       // return $allData;
        return view('admin.dashboard', compact('allData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request->input('title');
        $detail = $request->input('description');
       // return $description;
        $dom = new \DomDocument();
        $dom->loadHtml($detail);
        $images = $dom->getElementsByTagName('img');

        foreach($images as $k => $img){
            info($img);

            // $data = $img->getAttribute('src');
            // list($type, $data) = explode(';', $data);
            // list(, $data)      = explode(',', $data);
            // $data = base64_decode($data);
            // $image_name= "/admin/images/editor/" . time().$k. '.png';
            // $path = public_path() . $image_name;
            // file_put_contents($path, $data);
            // $img->removeAttribute('src');
            // $img->setAttribute('src', $image_name);
        }
        dd('ok');
        $detail = $dom->saveHTML();

        $result =  Editor::create([
            'title' => $title,
            'description' => $detail
        ]);
        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Editor  $editor
     * @return \Illuminate\Http\Response
     */
    public function show(Editor $editor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Editor  $editor
     * @return \Illuminate\Http\Response
     */
    public function edit(Editor $editor, $id)
    {
        $id = base64_decode($id);
        $getDataById =  Editor::find($id);

    //     $getImage =  $getDataById['description'];
    //     //dd($getImage);
    //    // $email  = 'name@example.com jj god test';
    //     $sting = strstr($getImage, 'src="/admin/images/editor/');
    //     $sting = strstr($sting, 'editor/');
    //     $findSting = strstr($sting, '">', true);
    //     $imageName = explode('/', $findSting)[1];

    //     dd( $imageName);



       // dd(explode(" ",$getDataById['description']));

     //  $chars = preg_split('/<[^>]*[^\/]>/i', $getDataById, -1);
     // dd($chars);
       // return $chars[0]['title'];

        return view('admin.edit', compact('getDataById'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Editor  $editor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Editor $editor, $id)
    {

        $id =  base64_decode($id);
        $getDataByUpdateId = Editor::find($id);

        $title = $request->input('title');
        $detail = $request->input('description');
       // dd($detail);
       // return $description;
        $dom = new \DomDocument();
        $dom->loadHtml($detail);

        $images = $dom->getElementsByTagName('img');
       // dd($images);
       $i = 1;
        foreach($images as $k => $img){
            $i++;
            $data = $img->getAttribute('src');
          //  var_dump($data);
          //  dd($data);
           list( $data) = explode(';', $data);

            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);

            $image_name= "/admin/images/editor/" . time().$k. '.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $data);
            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }
        dd('ok', $i);
        $detail = $dom->saveHTML();

        $getDataByUpdateId->title = $title;
        $getDataByUpdateId->description = $detail;
        $getDataByUpdateId->save();

       // dd($request->all());

      //  if($getDataByUpdateId == true){
        //     $title = $request->input('title');
        //     $detail = $request->input('description');

        //    // dd($detail);

        //     $dom = new \DomDocument();

        //     $dom->loadHtml($detail);
        //     $images = $dom->getElementsByTagName('img');
        //     //dd($images->length);

        //     //  if($images->length == 0){

        //     //     $getImage = $getDataByUpdateId['description'];
        //     // // dd($getImage);
        //     // // $email  = 'name@example.com jj god test';
        //     //     $sting = strstr($getImage, 'src="/admin/images/editor/');
        //     //     $sting = strstr($sting, 'editor/');
        //     //     $findSting = strstr($sting, '">', true);
        //     //     $imageName = explode('/', $findSting)[1];
        //     //     unlink(public_path('/admin/images/editor/'.$imageName));
        //     //    // dd( $imageName);
        //     //     $getDataByUpdateId->title = $title;
        //     //     $getDataByUpdateId->description = $detail;
        //     //     $getDataByUpdateId->save();
        //     //     return back();
        //     // }else
        //     if($images->length > 0){

        //         // $dom = new \DomDocument();
        //         // libxml_use_internal_errors(true);
        //         // $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        //         // $images = $dom->getElementsByTagName('img');

        //         foreach($images as $k => $img){

        //             $data = $img->getAttribute('src');
        //             list($type, $data) = explode(';', $data);
        //             list(, $data)      = explode(',', $data);
        //             $data = base64_decode($data);
        //             $image_name= "/admin/images/editor/" . time().$k. '.png';
        //             $path = public_path() . $image_name;
        //             file_put_contents($path, $data);
        //             $img->removeAttribute('src');
        //             $img->setAttribute('src', $image_name);
        //         }
        //         $detail = $dom->saveHTML();
        //         $getDataByUpdateId->title = $title;
        //         $getDataByUpdateId->description = $detail;
        //         $getDataByUpdateId->save();
        //         return back();

        //     }else{
        //          // $getDataByUpdateId->title = $title;
        //         // $getDataByUpdateId->description = $detail;
        //         // $getDataByUpdateId->save();
        //         // return back();
        //         dd('ok');
        //     }

        // }else{
        //     return 'false';
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Editor  $editor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Editor $editor)
    {
        //
    }

    public function deleteEditorImage(Request $request){
                 $data =  $request->src;
                 $imageName =  explode('/', $data)[6];
                 unlink(public_path('/admin/images/editor/'.$imageName));
    }
}
