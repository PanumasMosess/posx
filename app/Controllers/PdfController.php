<?php

namespace App\Controllers;

use TCPDF;

class PdfController extends BaseController
{
    public function pdf_Bill()
    {
        // create new PDF document
        $pdf = new TCPDF('P', 'mm', array(80, 200), true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetTitle('บิลเรียกเก็บเงิน');

        function _hex2rgb($color)
        {
            $color = str_replace('#', '', $color);
            if (strlen($color) != 6) {
                return array(0, 0, 0);
            }
            $rgb = array();
            for ($x = 0; $x < 3; $x++) {
                $rgb[$x] = hexdec(substr($color, (2 * $x), 2));
            }
            return $rgb;
        }

        // set default header data
        // $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        // $pdf->setFooterData(array(0,64,0), array(0,64,128));

        $pdf->SetHeaderData(false, false, false, false, false, _hex2rgb('#ffffff'));
        // set header and footer fonts
        // $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        // $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT - 13, PDF_MARGIN_TOP - 20, PDF_MARGIN_RIGHT - 13);
        // $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        // $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM - 10);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set default font subsetting mode
        $pdf->setFontSubsetting(true);

        // Set font
        // dejavusans is a UTF-8 Unicode font, if you only need to
        // print standard ASCII chars, you can use core fonts like
        // helvetica or times to reduce file size.

        $pdf->SetFont('thsarabun', '', 13, '', true);

        // Add a page
        $pdf->AddPage();

        //view mengarahไปที่ invoice.php
        $html = view('pdf/bill.php');

        // Print text using writeHTMLCell()
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, false, '', true);

        // ---------------------------------------------------------
        $this->response->setContentType('application/pdf');
        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        $pdf->Output('Bill.pdf', 'I');
    }

    public function pdf_BillOrder()
    {
        // create new PDF document
        $pdf = new TCPDF('P', 'mm', array(80, 100), true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetTitle('บิลสั่งออเดอร์');

        function _hex2rgb($color)
        {
            $color = str_replace('#', '', $color);
            if (strlen($color) != 6) {
                return array(0, 0, 0);
            }
            $rgb = array();
            for ($x = 0; $x < 3; $x++) {
                $rgb[$x] = hexdec(substr($color, (2 * $x), 2));
            }
            return $rgb;
        }

        // set default header data
        // $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        // $pdf->setFooterData(array(0,64,0), array(0,64,128));

        $pdf->SetHeaderData(false, false, false, false, false, _hex2rgb('#ffffff'));
        // set header and footer fonts
        // $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        // $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT - 13, PDF_MARGIN_TOP - 20, PDF_MARGIN_RIGHT - 13);
        // $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        // $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM - 10);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set default font subsetting mode
        $pdf->setFontSubsetting(true);

        // Set font
        // dejavusans is a UTF-8 Unicode font, if you only need to
        // print standard ASCII chars, you can use core fonts like
        // helvetica or times to reduce file size.

        $pdf->SetFont('thsarabun', '', 13, '', true);

        // Add a page
        $pdf->AddPage();

        //view mengarahไปที่ invoice.php
        $html = view('pdf/bill_order.php');

        // Print text using writeHTMLCell()
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, false, '', true);

        // ---------------------------------------------------------
        $this->response->setContentType('application/pdf');
        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        $pdf->Output('Order.pdf', 'I');
    }

    public function pdf_CancelledBillOrder()
    {
        // create new PDF document
        $pdf = new TCPDF('P', 'mm', array(80, 110), true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetTitle('ยกเลิกออเดอร์');

        function _hex2rgb($color)
        {
            $color = str_replace('#', '', $color);
            if (strlen($color) != 6) {
                return array(0, 0, 0);
            }
            $rgb = array();
            for ($x = 0; $x < 3; $x++) {
                $rgb[$x] = hexdec(substr($color, (2 * $x), 2));
            }
            return $rgb;
        }

        // set default header data
        // $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        // $pdf->setFooterData(array(0,64,0), array(0,64,128));

        $pdf->SetHeaderData(false, false, false, false, false, _hex2rgb('#ffffff'));
        // set header and footer fonts
        // $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        // $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT - 13, PDF_MARGIN_TOP - 15, PDF_MARGIN_RIGHT - 13);
        // $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        // $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM - 10);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set default font subsetting mode
        $pdf->setFontSubsetting(true);

        // Set font
        // dejavusans is a UTF-8 Unicode font, if you only need to
        // print standard ASCII chars, you can use core fonts like
        // helvetica or times to reduce file size.

        // $pdf->SetFont('thsarabun', '', 13, '', true);

        // Add a page
        $pdf->AddPage();

        // Rotate the text
        $pdf->StartTransform();
        $pdf->Rotate(45, 40, 50); // Rotate by 45 degrees

        // สร้างลายน้ำเป็นตัวหนังสือ
        $pdf->SetFont('thsarabun', 'B', 60);
        $pdf->SetTextColor(220, 220, 220); // สีเทาหรือสีลายน้ำ
        $pdf->Text(5, 40, 'Cancelled'); // ลายน้ำ

        // หยุดการเอียง
        $pdf->StopTransform();

        // สร้างข้อมูลและเปลี่ยนสีข้อมูล
        $pdf->SetFont('thsarabun', '', 13, true);
        $pdf->SetTextColor(0, 0, 0); // สีข้อมูล
        // $pdf->Text(25, 80, 'ข้อมูลที่คุณต้องการแสดง'); // ข้อมูล

        // ---------------------------------------------------------
        // view ที่จะแสดงใน PDF
        $html = view('pdf/bill_cencelled_order.php');

        // Print text using writeHTMLCell()
        $pdf->writeHTMLCell(0, 0, '', false, $html, 0, 0, 0, false, '', true); // แสดงที่ตำแหน่ง Y = 100

        $this->response->setContentType('application/pdf');
        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        $pdf->Output('CancelledOrder.pdf', 'I');
    }

    public function pdf_Receipt()
    {
        // create new PDF document
        $pdf = new TCPDF('P', 'mm', array(80, 200), true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetTitle('ใบเสร็จ');

        function _hex2rgb($color)
        {
            $color = str_replace('#', '', $color);
            if (strlen($color) != 6) {
                return array(0, 0, 0);
            }
            $rgb = array();
            for ($x = 0; $x < 3; $x++) {
                $rgb[$x] = hexdec(substr($color, (2 * $x), 2));
            }
            return $rgb;
        }

        // set default header data
        // $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        // $pdf->setFooterData(array(0,64,0), array(0,64,128));

        $pdf->SetHeaderData(false, false, false, false, false, _hex2rgb('#ffffff'));
        // set header and footer fonts
        // $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        // $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT - 13, PDF_MARGIN_TOP - 20, PDF_MARGIN_RIGHT - 13);
        // $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        // $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM - 10);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set default font subsetting mode
        $pdf->setFontSubsetting(true);

        // Set font
        // dejavusans is a UTF-8 Unicode font, if you only need to
        // print standard ASCII chars, you can use core fonts like
        // helvetica or times to reduce file size.

        $pdf->SetFont('thsarabun', '', 13, '', true);

        // Add a page
        $pdf->AddPage();

        //view mengarahไปที่ invoice.php
        $html = view('pdf/receipt.php');

        // Print text using writeHTMLCell()
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, false, '', true);

        // ---------------------------------------------------------
        $this->response->setContentType('application/pdf');
        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        $pdf->Output('Receipt.pdf', 'I');
    }
}
