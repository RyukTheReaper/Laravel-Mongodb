<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Annual Report PDF</title>

    <style>
        /* Basic Reset */
        html, body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Background for PDF */
        body {
            color: #333333;
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        /* Page Container */
        .container {
            width: 100%;
        }

        /* New header Styling */
        .header {
            padding: 15px;
            background-color: #3d004a;
            color: #ffffff;
            margin-bottom: 20px;
            border-radius: 8px;
            overflow: hidden;
            text-align: center;
        }

        /* Centering the container for logo and text */
        .header-content {
            display: inline-block;
            text-align: left;
            vertical-align: middle;
        }

        /* Header Logo Styling */
        .header-logo {
            display: inline-block;
            margin-right: 15px;
            vertical-align: middle;
        }

        .header-logo img {
            max-width: 100px;
            height: auto;
            margin-top: 10px;
        }

        /* Header Text Styling */
        .header-text {
            display: inline-block;
            vertical-align: middle;
        }

        .header-text h1 {
            font-size: 24px;
            margin: 0;
        }

        .header-text p {
            margin: 0;
            font-size: 16px;
            text-align: center;
        }

        /* Academic Year Styling */
        .academic-year {
            font-size: 16px;
            font-weight: bold;
            display: block;
            margin-top: 5px;
        }

        /* Content Styles */
        .content {
            padding: 10px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .content h2 {
            color: #000000;
            font-size: 24px;
            border-bottom: 2px solid #7e317b;
            padding-bottom: 10px;
            margin-top: 0;
            background-color: gold;
        }

        .content p {
            margin: 10px 0;
        }

        .content p strong {
            color: #333333;
        }

        .section {
            margin-bottom: 20px;
        }

        /* Table Styles */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        .table th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        .table td {
            background-color: #ffffff;
        }

        .table .total-row {
            font-weight: bold;
        }

        .footer {
            text-align: center;
            padding: 15px;
            margin-top: 20px;
            border-top: 1px solid #ddd;
            color: #666;
        }

        /* Print-Specific Styles */
        @media print {
            .container {
                background-color: #ffffff;
                box-shadow: none;
                padding: 10mm;
                margin: 0;
                border-radius: 0;
            }
        }

        /* Dompdf Specific Page Setup */
        @page {
            size: A4;
            margin: 20mm;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header-content">
                <div class="header-logo">
                    <img src="https://raw.githubusercontent.com/RyukTheReaper/Images/main/UB-Logo2.png" alt="University Logo">
                </div>
                <div class="header-text">
                    <h1>University of Belize Annual Report</h1>
                    <p class="academic-year">Academic Year: {{$report->academicYearID}}</p>
                </div>
            </div>
        </div>

        <section class="content">
            <h2>Report Details</h2>
            <div>
                <b>Department:</b> {{ $report->department }}
            </div>
            <br>
            <div>
                <b>Report By: </b>{{ $user->name }}
            </div>
        </section>

        <section class="content">
            <h2>Number of Staff for the Academic Year under Review</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th rowspan="2">Faculties</th>
                        <th colspan="3">Staff</th>
                    </tr>
                    <tr>
                        <th>Full-time Faculty</th>
                        <th>Adjunct Faculty</th>
                        <th>Non-teaching Staff</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Education and Arts</td>
                        <td>{{ $report->numberOfStaff['FulltimeFaculty']['EducationAndArts'] }}</td>
                        <td>{{ $report->numberOfStaff['AdjunctFaculty']['EducationAndArts'] }}</td>
                        <td>{{ $report->numberOfStaff['NonTeachingStaff']['EducationAndArts'] }}</td>
                    </tr>
                    <tr>
                        <td>Management and Social Sciences</td>
                        <td>{{ $report->numberOfStaff['FulltimeFaculty']['ManagementAndSocialSciences'] }}</td>
                        <td>{{ $report->numberOfStaff['AdjunctFaculty']['ManagementAndSocialSciences'] }}</td>
                        <td>{{ $report->numberOfStaff['NonTeachingStaff']['ManagementAndSocialSciences'] }}</td>
                    </tr>
                    <tr>
                        <td>Health Sciences</td>
                        <td>{{ $report->numberOfStaff['FulltimeFaculty']['HealthSciences'] }}</td>
                        <td>{{ $report->numberOfStaff['AdjunctFaculty']['HealthSciences'] }}</td>
                        <td>{{ $report->numberOfStaff['NonTeachingStaff']['HealthSciences'] }}</td>
                    </tr>
                    <tr>
                        <td>Science and Technology</td>
                        <td>{{ $report->numberOfStaff['FulltimeFaculty']['ScienceAndTechnology'] }}</td>
                        <td>{{ $report->numberOfStaff['AdjunctFaculty']['ScienceAndTechnology'] }}</td>
                        <td>{{ $report->numberOfStaff['NonTeachingStaff']['ScienceAndTechnology'] }}</td>
                    </tr>
                    <!-- Total Row -->
                    <tr class="total-row">
                        <td>Total</td>
                        <td>{{ $report->numberOfStaff['FulltimeFaculty']['Total'] }}</td></td>
                        <td>{{ $report->numberOfStaff['AdjunctFaculty']['Total'] }}</td>
                        <td>{{ $report->numberOfStaff['NonTeachingStaff']['Total'] }}</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <footer class="footer">
            <p>&copy; 2024 University of Belize. All Rights Reserved.</p>
        </footer>
    </div>
</body>
</html>
