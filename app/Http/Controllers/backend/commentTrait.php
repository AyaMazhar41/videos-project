<?php
namespace App\Http\Controllers\backend;
use App\Http\Requests\BackEnd\comments\store;
use App\Models\comment;

trait commentTrait {
	public function commentStore(store $request)
	{
		$requestArray=$request->all() + ['user_id'=>auth()->user()->id];

		comment::create($requestArray);
		return redirect()->back();
	}

public function commentUpdate($id, store $request)
	{
		$row=comment::findOrFail($id);
		$row->update($request->all());
		return redirect()->back();
	}

	public function commentDelete($id)
	{
		$row=comment::findOrFail($id);
		$row->delete();

		//return redirect()->back();
		return redirect()->route('videos.edit' , ['id' => $row->video_id,'#comments']);

	}
}