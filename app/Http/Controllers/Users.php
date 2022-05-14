<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Users extends Controller
{
    public function index()
    {
        $data["user"] = Auth::user();
        return view("main_page", $data);
    }

    public function histories(Request $request) {
        $data["search"] = $request->query("search", "");
        $data["histories"] = History::where("user_id", Auth::id())->where(function ($where) use ($data) {
            if ($data["search"]) {
                $where->where("comments", "like", "%" . $data["search"] . "%");
            }
        })->orderBy("created_at")->get();
        return view("histories", $data);
    }

    public function getHistories()
    {
        $histories = History::where("id", Auth::id())->orderByDesc("created_at")->limit(5)->get();
        echo view("components.histories_table", ["histories" => $histories])->render();
    }
}
