<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Report</title>
    <style>
        @page {
            size: A4;
            margin: 20mm; /* Adjust margins as needed */
        }

        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333333;
            box-sizing: border-box; /* Ensure padding is included in width */
        }
        .container {
            width: 100%;
            max-width: 100%;
            padding: 0; /* Remove padding to fit A4 dimensions */
            box-sizing: border-box;
        }
        /* Header Styles */
        .header {
            background-color: #7e317b;
            color: #ffd700;
            text-align: center;
            padding: 15px; /* Adjust padding for A4 */
            margin-bottom: 15px; /* Adjust margin for A4 */
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: relative;
            box-sizing: border-box;
        }
        .header img {
            max-width: 100px; /* Adjust logo size to fit A4 */
            position: absolute;
            top: 10px;
            left: 10px;
        }
        .header h1, .header h3 {
            margin: 0;
            padding: 0;
        }
        .header h1 {
            font-size: 24px; /* Adjust font size for A4 */
        }
        .header h3 {
            font-size: 18px; /* Adjust font size for A4 */
        }
        /* Content Styles */
        .content {
            background-color: #ffffff;
            padding: 15px; /* Adjust padding for A4 */
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            margin-bottom: 15px; /* Adjust margin for A4 */
        }
        .content h2 {
            color: #7e317b;
            font-size: 20px; /* Adjust font size for A4 */
            border-bottom: 2px solid #7e317b;
            padding-bottom: 10px;
            margin-top: 0;
        }
        .content p {
            margin: 8px 0; /* Adjust margin for A4 */
        }
        .content p strong {
            color: #333333;
        }
        .section {
            margin-bottom: 15px; /* Adjust margin for A4 */
        }
        /* Footer Styles */
        .footer {
            text-align: center;
            padding: 10px;
            margin-top: 15px; /* Adjust margin for A4 */
            border-top: 1px solid #ddd;
            color: #666;
        }

        /* Print-Specific Styles */
        @media print {
            body {
                background-color: #ffffff;
            }
            .header img {
                max-width: 80px; /* Adjust logo size for print */
                position: static;
                margin-bottom: 10px;
            }
            .header {
                box-shadow: none;
                padding: 10px;
            }
            .content {
                box-shadow: none;
            }
        }
    </style>

</head>
<body>
    <div class="container">
        <!-- Header Section  -->
        <div class="header">
            <h1>Report Type Goes Here</h1>
            <h3>Report ID: {{ $report->_id }}</h3>
        </div>

        <!-- Content Section -->
        <div class="content">

            <b>Deadline: </b> {{ $report->deadline }}
            </br>
            <b>Academic Year ID: </b> {{ $report->academicYearID }}
            </br>
            <b>Division: Department, Centers/Institutes: </b> {{ $report->department }}
            </br>
            <b>Reports to: </b> {{ $report->reportsTo}}
            </br>
            <b>I. State your Mission Statement: </b> {{ $report->missionStatement }}
            </br>
            <b>II. Strategic Goals: </b> {{ $report->strategicGoals }}
            </br>
            <b>III. Accomplishments: </b> {{ $report->accomplishments }}
            </br>
            <b>IV. Research Partnerships: </b> {{ $report->researchPartnerships }}
            </br>
            <b>V. Student Success: </b> {{ $report->studentSuccess }}
            </br>
            <b>VI. Activities for the Year: </b> {{ $report->activities}}
            </br>
            <b>VII. Administrative Data: </b> {{ $report->administrativeData}}
            </br>
            <b>VIII. Financial Budget: </b> {{ $report->financialBudget}}
            </br>

        </div>
    </div>
</body>
</html> 
