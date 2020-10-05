<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Banner;
use Image;


class BannersController extends Controller
{
    public function addBanner(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //dd($data);
            $banner = new Banner();
            $banner->title = $data['title'];
            $banner->link = $data['link'];

            if (empty($data['status'])) {
                $status = '0';
            } else {
                $status = '1';
            }
            // Upload Image
            if ($request->hasFile('image')) {
                $image_tmp = $request->file('image');
                if ($image_tmp->isValid()) {
                    // Upload Images after Resize
                    $extension = $image_tmp->getClientOriginalExtension();
                    $fileName = rand(111, 99999) . '.' . $extension;
                    $large_image_path = 'images/frontend_images/banners/large'.'/'.$fileName;
                    $medium_image_path = 'images/frontend_images/banners/medium'.'/'.$fileName;
                    $small_image_path = 'images/frontend_images/banners/small'.'/'.$fileName;

                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600, 600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300, 300)->save($small_image_path);

                    $banner->image = $fileName;
                }
            }
                $banner->status = $status;
                $banner->save();
                return redirect()->back()->with('flash_message_success', 'Banner agregado correctamente!');
            }
        return view('admin.banners.add_banner');
        }

    public function editBanner(Request $request, $id=null ){
        if ($request->isMethod('post')) {
            $data = $request->all();

            if (empty($data['status'])) {
                $status = '0';
            } else {
                $status = '1';
            }
            if (empty($data['title'])){
                $data['title'] = "";
            }
            if (empty($data['link'])){
                $data['link'] = "";

            }
            // Upload Image
            if ($request->hasFile('image')) {
                $image_tmp = $request->file('image');
                if ($image_tmp->isValid()) {
                    // Upload Images after Resize
                    $extension = $image_tmp->getClientOriginalExtension();
                    $fileName = rand(111, 99999) . '.' . $extension;
                    $large_image_path = 'images/frontend_images/banners/large'.'/'.$fileName;
                    $medium_image_path = 'images/frontend_images/banners/medium'.'/'.$fileName;
                    $small_image_path = 'images/frontend_images/banners/small'.'/'.$fileName;

                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600, 600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300, 300)->save($small_image_path);
                }
            } else if (!empty($data['current_image'])) {
                $fileName = $data['current_image'];
            } else {
                $fileName = '';
            }
            Banner::where('id', $id)->update(['status'=>$status,'title'=>$data['title'],'link'=>$data['link'], 'image'=>$fileName]);
            return redirect()->back()->with('flash_message_success', 'Banner editado correctamente');
        }
        $bannerDetails = Banner::where('id', $id)->first();
        return view('admin.banners.edit_banner')->with(compact('bannerDetails'));
    }
    public function viewBanners(){
        $banners = Banner::get();
        return view('admin.banners.view_banners')->with(compact('banners'));
    }
    public function deleteBanner($id = null){
        Banner::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','Banner eliminado correctamente');
    }
}


