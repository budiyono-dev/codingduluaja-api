<?php

namespace App\Http\Controllers\Feedback;

use App\Helper\StringUtil;
use App\Http\Controllers\Controller;
use App\Http\Requests\Application\CreateSaranRequest;
use App\Models\Report;
use App\Models\ReportImage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        return view('page.fb.saran');
    }

    public function indexAdmin()
    {
        $report = Report::query()
            ->with('image', 'user')
            ->select('id', 'user_id', 'category', 'title', 'created_at', 'updated_at')
            ->get();

        return view('page.admin.fb', [
            'report' => $report,
        ]);
    }

    public function pageDetail(int $id)
    {
        $report = Report::query()
            ->with('image', 'user')
            ->findOrFail($id);

        // dd($report);
        return view('page.admin.fb-detail', [
            'report' => $report,
        ]);
    }

    public function post(CreateSaranRequest $request)
    {

        $req = $request->validated();
        DB::transaction(function () use ($req) {
            $files = $req['gambar'];
            $fnames = [];
            foreach ($files as $f) {
                $filename = StringUtil::uuidWihoutStrip().'_'.$f->getClientOriginalName();
                $fnames[] = $filename;
                $f->move(public_path('img'), $filename);
            }
            $report = Report::create([
                'user_id' => $this->authUserId(),
                'category' => $req['kategori'],
                'title' => $req['judul'],
                'payload' => $req['payload_saran'],
            ]);
            $imagesToSave = [];
            $now = Carbon::now();
            foreach ($fnames as $n) {
                $imagesToSave[] = [
                    'report_id' => $report->id,
                    'image' => $n,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
            ReportImage::insert($imagesToSave);
        });

        return redirect()->route('feedback.report')->with('status', 'Success Send Report|success');
    }
}
