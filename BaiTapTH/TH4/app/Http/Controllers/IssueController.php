<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Computer;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    // Hiển thị danh sách các vấn đề (có phân trang)
    public function index()
    {
        // Sử dụng paginate để lấy dữ liệu có phân trang (5 bản ghi mỗi trang)
        $issues = Issue::with('computer')->paginate(5);
        return view('issues.index', compact('issues'));
    }

    // Hiển thị form thêm mới vấn đề
    public function create()
    {
        // Lấy danh sách máy tính để hiển thị trong dropdown
        $computers = Computer::all();
        return view('issues.create', compact('computers'));
    }

    // Lưu vấn đề mới
    public function store(Request $request)
    {
        // Kiểm tra dữ liệu đầu vào (validation)
        $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'reported_by' => 'required|max:50',
            'reported_date' => 'required|date',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Progress,Resolved',
            'description' => 'required',
        ]);

        // Lưu dữ liệu vào cơ sở dữ liệu
        Issue::create($request->all());

        // Chuyển hướng về trang danh sách với thông báo thành công
        return redirect()->route('issues.index')->with('success', 'Vấn đề đã được thêm thành công!');
    }

    // Hiển thị form chỉnh sửa vấn đề
    public function edit($id)
    {
        // Lấy thông tin vấn đề cần chỉnh sửa
        $issue = Issue::findOrFail($id);
        $computers = Computer::all(); // Lấy danh sách máy tính
        return view('issues.edit', compact('issue', 'computers'));
    }

    // Cập nhật thông tin vấn đề
    public function update(Request $request, $id)
    {
        // Kiểm tra dữ liệu đầu vào (validation)
        $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'reported_by' => 'required|max:50',
            'reported_date' => 'required|date',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Progress,Resolved',
            'description' => 'required',
        ]);

        // Tìm đối tượng Issue cần cập nhật
        $issue = Issue::findOrFail($id);

        // Cập nhật thông tin
        $issue->update($request->all());

        // Điều hướng trở lại trang index với thông báo thành công
        return redirect()->route('issues.index')->with('success', 'Vấn đề đã được cập nhật thành công!');
    }

    // Xóa vấn đề
    public function destroy($id)
    {
        // Tìm và xóa vấn đề
        $issue = Issue::findOrFail($id);
        $issue->delete();

        // Điều hướng trở lại trang index với thông báo thành công
        return redirect()->route('issues.index')->with('success', 'Vấn đề đã được xóa thành công!');
    }
}