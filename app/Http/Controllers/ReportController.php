<?php

namespace App\Http\Controllers;

use App\Models\FoodOrder;
use Illuminate\Http\Request;
use PDF;
use DB;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        return view('app.report.index');
    }

    public function report(Request $request )
    {
         $report_type = $request->report_type;
         $from_date = $request->from_date;
         $to_date = $request->to_date;
         set_time_limit(300);

        switch ($report_type) {
            case 'whole_sales':
                $dailyReports = FoodOrder::whereNotNull('payment_status')
                                          ->whereDate('created_at','>=', $from_date)
                                          ->whereDate('created_at','<=', $to_date)
                                          ->get();
                $heading = 'Sales Report from '.$from_date.' To '.$to_date;
                $data = [
                    'heading' => $heading,
                    'from_date' => $from_date,
                    'to_date' => $to_date,
                    'dailyReports' => $dailyReports
                ];

                $view = \View::make('app.report.whole-report', ['dailyReports'=>$dailyReports, 'heading' => $heading]);
                $html_content = $view->render();
                PDF::AddPage('L');
                PDF::setFooterCallback(function($pdf){
                   $pdf->SetY(-15);
                   // Set font
                   $pdf->SetFont('helvetica', 'I', 8);
                    // Page number
                    $pdf->Cell(0, 10, 'Developed By Traveltech.digital- Page '.$pdf->getAliasNumPage().'/'.$pdf->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
                });
                PDF::writeHTML($html_content, true, false, true, false, '');
                ob_end_clean();
                PDF::Output('Report.pdf');


            case 'payment_sales';
            $dailyReports = FoodOrder::select('name',
            DB::raw('count(quantity) as total_order'),DB::raw('sum(price) as total_price'),
            DB::raw('sum(discounted_price) as total_discount_price'),DB::raw('sum(net_sale_price) as total_cash_rcv'),
            DB::raw('sum(vat) as total_vat'))
            ->leftJoin('payment_types','payment_types.id', '=','payment_type_id')
            ->whereDate('food_orders.created_at','>=', $from_date)
            ->whereDate('food_orders.created_at','<=', $to_date)
            ->groupBy('payment_type_id')
            ->get();



            $heading = 'Payment-Wise Sales Report from '.$from_date.' To '.$to_date;
            $data = [
            'heading' => $heading,
            'from_date' => $from_date,
            'to_date' => $to_date,
            'dailyReports' => $dailyReports
            ];

            $view = \View::make('app.report.payment-wise-report', ['dailyReports'=>$dailyReports, 'heading' => $heading]);
            $html_content = $view->render();
            PDF::AddPage();
            PDF::setFooterCallback(function($pdf){
            $pdf->SetY(-15);
            // Set font
            $pdf->SetFont('helvetica', 'I', 8);
            // Page number
            $pdf->Cell(0, 10, 'Page '.$pdf->getAliasNumPage().'/'.$pdf->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
            });
            PDF::writeHTML($html_content, true, false, true, false, '');
            ob_end_clean();
            PDF::Output('Report.pdf');
            default:
                # code...
                break;
        }

    }
}
