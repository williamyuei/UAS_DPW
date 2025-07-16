<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>@yield('title')</title>
    <style>
        /* Reset and Base Styles */
        body {
            font-family: DejaVu Sans, Arial, sans-serif;
            margin: 0;
            padding: 20px;
            color: #333;
            font-size: 12px;
            line-height: 1.4;
        }
        
        /* Layout */
        .report-container {
            max-width: 100%;
            margin: 0 auto;
            padding: 15px;
        }
        
        .report-header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #2c3e50;
            padding-bottom: 15px;
        }
        
        .library-name {
            font-size: 20px;
            font-weight: bold;
            margin: 0 0 5px 0;
            color: #2c3e50;
        }
        
        .library-address {
            font-size: 12px;
            color: #666;
            margin: 0;
        }
        
        .report-title {
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            margin: 15px 0;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }
        
        .report-date {
            font-size: 12px;
            margin-bottom: 15px;
            color: #666;
            text-align: left;
        }
        
        /* Tables */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 11px;
        }
        
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        
        th {
            background-color: #f5f5f5;
            font-weight: bold;
        }
        
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        /* Signature */
        .signature {
            margin-top: 40px;
            text-align: right;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }
        
        .signature-name {
            font-weight: bold;
            margin: 40px 0 0 0;
        }
        
        .signature-title {
            font-style: italic;
            color: #666;
            margin: 5px 0 0 0;
        }
        
        /* Print Specific Styles */
        @page {
            margin: 1cm;
        }
        
        @media print {
            body {
                padding: 0;
                font-size: 10pt;
            }
            
            .report-container {
                padding: 0;
                box-shadow: none;
            }
            
            .no-print {
                display: none !important;
            }
            
            table {
                page-break-inside: auto;
            }
            
            tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }
        }
    </style>
</head>
<body>
    <div class="report-container">
        <div class="report-header">
            <h1 class="library-name">Perpustakaan Daerah Kabupaten Sumbawa</h1>
            <p class="library-address">Jl. Setia Budi No.12A, Seketeng, Kec. Sumbawa, Kabupaten Sumbawa</p>
        </div>
        
        @yield('konten')
        
        <div class="signature">
            <p>Mengetahui,</p>
            <p class="signature-name">( Iin Gantihar )</p>
            <p class="signature-title">Kepala Perpustakaan</p>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
