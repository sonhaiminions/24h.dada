<?php

namespace App\Http\Controllers;
use App\Category;
use App\News;
use Illuminate\Http\Request;

class CategoryController extends Controller {
	public function list() {
		$cate = Category::all();
		return view('admin/category/list', ['cate' => $cate]);
	}
	public function search(request $request) {
		$a = '%' . $request->search . '%';

		$cate = Category::where('name', 'like', $a)->get();
		return view('admin/category/list', ['cate' => $cate]);

	}
	public function add() {
		return view('admin/category/add');
	}

	public function postadd(Request $request) {

		$category = new Category;
		if ($request->txtCateName == $category->name) {
			$this->validate($request,
				[
					'txtCateName' => 'required |
				min:4|max:100',
					'txtCateDes' => 'required|min:4',
				],
				[
					'txtCateName.required' => 'bạn chưa nhập tên !',
					'txtCateName.unique' => 'tên đã tồn tại',
					'txtCateName.min' => 'tên thể loại tối thiểu là 4 ký tự',
					'txtCateDes.min' => 'mô tả tối thiểu là 4 ký tự',
				]);
		} else {
			$this->validate($request,
				[
					'txtCateName' => 'required | unique:category,name|
				min:4|max:100',
					'txtCateDes' => 'required|min:4',
				],
				[
					'txtCateName.required' => 'bạn chưa nhập tên !',
					'txtCateName.unique' => 'tên đã tồn tại',
					'txtCateName.min' => 'tên thể loại tối thiểu là 4 ký tự',
					'txtCateDes.min' => 'mô tả tối thiểu là 4 ký tự',
				]);
		}
		$category->name = $request->txtCateName;
		$category->des = $request->txtCateDes;
		$category->save();
		return redirect('admin/category/add')->with('thongbao', 'thêm thành công');

	}
	public function edit($id) {
		$cate = Category::find($id);
		return view('admin/category/edit', ['cate' => $cate]);
	}
	public function postedit(Request $request, $id) {
		$this->validate($request,
			[
				'txtCateName' => 'required |unique:category,name|
				min:4|max:100',
				'txtCateDes' => 'required|min:4',
			],
			[
				'txtCateName.required' => 'bạn chưa nhập tên !',
				'txtCateName.unique' => 'tên đã tồn tại',
				'txtCateName.min' => 'tên thể loại tối thiểu là 4 ký tự',
				'txtCateDes.min' => 'mô tả tối thiểu là 4 ký tự',
			]);
		$category = Category::find($id);
		$category->name = $request->txtCateName;
		$category->des = $request->txtCateDes;
		$category->save();
		return redirect('admin/category/edit/' . $id)->with('thongbao', 'sửa thành công');

	}
	public function delete($id) {
		$tin = Category::find($id)->TinTuc;
		foreach ($tin as $key) {
			News::destroy($key->id);
		}
		Category::destroy($id);
		return redirect()->back()->with('success', 'xóa thành công');

	}

}
