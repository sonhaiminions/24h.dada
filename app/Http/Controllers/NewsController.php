<?php

namespace App\Http\Controllers;
use App\Category;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller {
	public function list() {
		$new = News::all();
		return view('admin/news/list', ['new' => $new]);
	}
	public function search(request $request) {
		$a = '%' . $request->search . '%';

		$new = News::where('title', 'like', $a)->get();
		return view('admin/news/list', ['new' => $new]);

	}
	public function add() {
		$cate = Category::all();
		return view('admin/news/add', ['cate' => $cate]);
	}
	public function postadd(Request $request) {
		$this->validate($request,
			[
				'txttitle' => 'required | unique:news,title|
				min:4|max:100',

				'txtcontent' => 'required',
				'txtimg' => 'required',
				// 'txtimg' => 'required|mimes:jpg,png',

			],
			[
				'txttitle.required' => 'bạn chưa nhập tên !',
				'txttitle.unique' => 'tên đã tồn tại',
				'txttitle.min' => 'tên thể loại tối thiểu là 4 ký tự',

				'txtcontent.required' => 'bạn chưa nhập nội dung !',
				'txtimg.required' => 'chuwa nhap file !',
				// 'txtimg.image' => 'file nhập phải là file ảnh !',
			]);
		$new = new News;
		$new->title = $request->txttitle;
		$new->id_cat = $request->category;
		$new->content = $request->txtcontent;
		$file = $request->file('txtimg');
		if ($file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png') {
			$file->move('img', $file->getclientoriginalname());
			$new->img = $file->getclientoriginalname();
			$new->save();
			return redirect('admin/news/add')->with('thongbao', 'thêm thành công');
		} else {
			return redirect('admin/news/add')->with('thongbao', 'file anh  phai la png ,jpg');
		}

	}
	public function delete($id) {
		News::destroy($id);
		return redirect()->back()->with('thongbao', 'xóa thành công');

	}
	public function edit($id) {
		$new = News::find($id);
		$cate = Category::all();

		return view('admin/news/edit', ['new' => $new, 'cate' => $cate]);
	}
	public function postedit(Request $request, $id) {

		$new = News::find($id);
		if ($request->txttitle == $new->title) {
			$this->validate($request,
				[
					'txttitle' => 'required |
				min:4|max:100',

					'txtcontent' => 'required',

					// 'txtimg' => 'required|mimes:jpg,png',

				],
				[
					'txttitle.required' => 'bạn chưa nhập tên !',
					'txttitle.unique' => 'tên đã tồn tại',
					'txttitle.min' => 'tên thể loại tối thiểu là 4 ký tự',

					'txtcontent.required' => 'bạn chưa nhập nội dung !',
					'txtimg.required' => 'chua nhap file !',

					// 'txtimg.image' => 'file nhập phải là file ảnh !',
				]);
		} else {
			$this->validate($request,
				[
					'txttitle' => 'required | unique:news,title|
				min:4|max:100',

					'txtcontent' => 'required',

					// 'txtimg' => 'required|mimes:jpg,png',

				],
				[
					'txttitle.required' => 'bạn chưa nhập tên !',
					'txttitle.unique' => 'tên đã tồn tại',
					'txttitle.min' => 'tên thể loại tối thiểu là 4 ký tự',

					'txtcontent.required' => 'bạn chưa nhập nội dung !',
					'txtimg.required' => 'chua nhap file !',

					// 'txtimg.image' => 'file nhập phải là file ảnh !',
				]);
		}

		$new->title = $request->txttitle;
		$new->id_cat = $request->category;
		$new->content = $request->txtcontent;
		$file = $request->file('txtimg');
		if ($request->hasfile('txtimg')) {
			if ($file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png') {
				$file->move('img', $file->getclientoriginalname());
				$new->img = $file->getclientoriginalname();
				$new->save();
				return redirect('admin/news/edit/' . $id)->with('thongbao', 'sửa thành công');
			} else {
				return redirect('admin/news/edit/' . $id)->with('thongbao', 'file anh  phai la png ,jpg');
			}
		} else {
			$new->save();
			return redirect('admin/news/edit/' . $id)->with('thongbao', 'sửa thành công');
		}

	}

}
