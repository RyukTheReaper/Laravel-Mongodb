<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University of Belize Key Statistics Report</title>
    <style>
        /* Basic Reset */
        html, body {
            margin: 0;
            padding: 0;
            box-sizing: border-box; /* Ensure padding is included in width */
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

        /* Header Styling */
        .header {
            padding: 15px; /* Increased padding to ensure enough space */
            background-color: #3d004a; /* Purple background for the header */
            color: #ffffff; /* White text color */
            margin-bottom: 20px;
            border-radius: 8px;
            overflow: hidden; /* Clear floats */
            text-align: center; /* Center content in the header */
        }

        /* Centering the container for logo and text */
        .header-content {
            display: inline-block; /* Ensure it only takes up as much space as needed */
            text-align: left; /* Align items inside this container to the left */
            vertical-align: middle; /* Align vertically with surrounding content */
        }

        /* Header Logo Styling */
        .header-logo {
            display: inline-block; /* Keep logo inline with the text */
            margin-right: 15px; /* Space between the logo and the text */
            vertical-align: middle; /* Align vertically with the text */
        }

        .header-logo img {
            max-width: 100px; /* Adjust logo size */
            height: auto; /* Maintain aspect ratio */
            margin-top: 10px; /* Adjust as needed to align with text */
        }

        /* Header Text Styling */
        .header-text {
            display: inline-block; /* Ensure text is inline with the logo */
            vertical-align: middle; /* Align vertically with the logo */
        }

        .header-text h1 {
            font-size: 24px;
            margin: 0;
        }

        .header-text p {
            margin: 0;
            font-size: 16px;
            text-align: center; /* Center text for alignment */
        }

        /* Academic Year Styling */
        .academic-year {
            font-size: 16px;
            font-weight: bold;
            display: block; /* Ensure it takes full width for centering */
            margin-top: 5px; /* Space between the h1 and the p */
        }

        /* Content Styles */
        .content {
            padding: 10px;
            background-color: #ffffff; /* White background for the content */
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .content h2 {
            color: #000000; /* Changed to black */
            font-size: 24px;
            border-bottom: 2px solid #7e317b;
            padding-bottom: 10px;
            margin-top: 0;
            background-color: gold; /* Gold background color */
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center; /* Align text to center for better readability */
        }

        th {
            background-color: #f2f2f2;
        }

            /* Additional CSS for left-aligning table cell text */
        .table-left-align td {
        text-align: left; /* Align text to the left */
         }

        /* Footer Styles */
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
                background-color: #ffffff; /* White background for the content area */
                box-shadow: none; /* Remove shadow for print */
                padding: 10mm; /* Adjust padding for print if needed */
                margin: 0; /* Remove margin for print */
                border-radius: 0; /* Remove border radius for print */
            }
        }

        /* Dompdf Specific Page Setup */
        @page {
            size: A4 landscape; /* Set the page size and orientation here */
            margin: 20mm; /* Adjust margins as needed */
        }
    </style>
</head>
<body>
    <div class="header">
            <div class="header-content">
                <div class="header-logo">
                    <img src="https://raw.githubusercontent.com/RyukTheReaper/Images/main/UB-Logo2.png" alt="University Logo">
                </div>
                <div class="header-text">
                    <h1>University of Belize Annual Report</h1>
                    <p class="academic-year">Academic Year:{{ $report->academicYearID }}</p>
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
    <div class="section-title">1. Students Enrolment for the Academic Year under review</div>
        <table>
            <thead>
                <tr>
                    <th>Associate</th>
                    <th>Undergraduate</th>
                    <th>Graduate</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $report->currentStudentEnrollmentTrend['associates'] }}</td>
                    <td>{{ $report->currentStudentEnrollmentTrend['undergraduate'] }}</td>
                    <td>{{ $report->currentStudentEnrollmentTrend['graduate'] }}</td>
                    <td>{{ $report->currentStudentEnrollmentTrend['Total'] }}</td>
                </tr>
            </tbody>
        </table>

    <div class="section-title">2. Student Enrolment Trend (Academic Level)</div>
    <table>
        <thead>
            <tr>
                <th>Degree Program</th>
                @foreach ($report->studentEnrollmentTrend as $trend)
                    <th>{{ $trend['academicYear'] }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach (['associate', 'undergraduate', 'graduate', 'other'] as $category)
                <tr>
                    <td>{{ ucfirst($category) }}</td>
                    @foreach ($report->studentEnrollmentTrend as $trend)
                        <td>{{ $trend[$category] }}</td>
                    @endforeach
                </tr>
            @endforeach
            <tr>
                <td><strong>Total</strong></td>
                @foreach ($report->studentEnrollmentTrend as $trend)
                    <td>{{ $trend['Total'] }}</td>
                @endforeach
            </tr>
        </tbody>
    </table>
    <div class="section-title">3. Student Enrolment Trend (Per Faculty)</div>
    <table>
        <thead>
            <tr>
                <th>Faculty</th>
                @foreach ($report->enrollmentTrendPerFaculty as $yearData)
                    <th>{{ $yearData['academicYear'] }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ([
                'educationAndArts' => 'Education and Arts',
                'managementAndSocialScience' => 'Management and Social Science',
                'healthScience' => 'Health Science',
                'scienceAndTechnology' => 'Science and Technology'
            ] as $facultyKey => $facultyName)
                <tr>
                    <td>{{ $facultyName }}</td>
                    @foreach ($report->enrollmentTrendPerFaculty as $yearData)
                        <td>{{ $yearData[$facultyKey] }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
        
    <div class="section-title">4. Graduation Statistics</div>
        <table>
            <thead>
                <tr>
                    <th>Faculty</th>
                    <th colspan="3">Academic Year 2021/2022</th>
                    <th colspan="3">Academic Year 2022/2023</th>
                    <th colspan="3">Academic Year 2023/2024</th>
                </tr>
                <tr>
                    <th></th>
                    <th>Associate</th>
                    <th>Bachelor</th>
                    <th>Honors*</th>
                    <th>Associate</th>
                    <th>Bachelor</th>
                    <th>Honors*</th>
                    <th>Associate</th>
                    <th>Bachelor</th>
                    <th>Honors*</th>
                </tr>
            </thead>
            <tbody>
                @php
                    // Prepare a mapping of faculties by academic year
                    $facultiesByYear = [];
                    foreach ($report->graduationStatistics as $yearData) {
                        $facultiesByYear[$yearData['academicYear']] = $yearData['faculties'];
                    }
                @endphp

                @foreach ($facultiesByYear['2021/2022'] as $faculty)
                    <tr>
                        <td>{{ $faculty['degree'] }}</td>

                        @foreach (['2021/2022', '2022/2023', '2023/2024'] as $year)
                            @php
                                $currentFaculty = collect($facultiesByYear[$year] ?? [])->firstWhere('degree', $faculty['degree']);
                            @endphp
                            <td>{{ $currentFaculty['Associates'] ?? '' }}</td>
                            <td>{{ $currentFaculty['Bachelors'] ?? '' }}</td>
                            <td>{{ $currentFaculty['Honors'] ?? '' }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    <div class="section-title">5. Graduates by Age</div>
    <table class="table-left-align">
        <tr>
            <td>{{ $report->graduates['GraduatesByAge'] }}</td>
        </tr>
    </table>

    <div class="section-title">6. Graduates by Districts</div>
    <table class="table-left-align">
        <tr>
            <td>{{ $report->graduates['GraduatesByDistrict'] }}</td>
        </tr>
    </table>
    
    <div class="section-title">7. Origin of Students</div>
    <table>
        <thead>
            <tr>
                <th>Location</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Belize</td>
                <td>{{ $report->studentOrigin['Belize'] }}</td>
            </tr>
            <tr>
                <td>Central American Countries</td>
                <td>{{ $report->studentOrigin['CentralAmericanCountries'] }}</td>
            </tr>
            <tr>
                <td>Other Countries</td>
                <td>{{ $report->studentOrigin['OtherCountries'] }}</td>
            </tr>
        </tbody>
    </table>

    <div class="section-title">8. Campus Statistics</div>
    <table>
        <thead>
            <tr>
                <th>Campus</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Belize City</td>
                <td>{{ $report->campusStatistics['BelizeCity'] }}</td>
            </tr>
            <tr>
                <td>Belmopan</td>
                <td>{{ $report->campusStatistics['Belmopan'] }}</td>
            </tr>
            <tr>
                <td>Punta Gorda</td>
                <td>{{ $report->campusStatistics['PuntaGorda'] }}</td>
            </tr>
            <tr>
                <td>Central Farm</td>
                <td>{{ $report->campusStatistics['CentralFarm'] }}</td>
            </tr>
            <tr>
                <td>Satellite Programs</td>
                <td>{{ $report->campusStatistics['SatellitePrograms'] }}</td>
            </tr>
        </tbody>
    </table>

    <footer class="footer">
        <p>&copy; 2024 University of Belize. All Rights Reserved.</p>
    </footer>

</body>
</html>