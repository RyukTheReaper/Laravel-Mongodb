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

        /* New header Styling */
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
            size: A4;
            margin: 20mm; /* Adjust margins as needed */
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
                    <p class="academic-year">Academic Year: {{$report->academicYearID}} </p>
                </div>
            </div>
        </div>

        <section class="content">
            <h2>Report Details</h2>
            <div>
                <b>Division: Department, Centers/Institutes:</b> {{ $report->department }}
            </div>
            <br>
            <div>
                <b>Report By:</b> {{ $user->name }}
            </div>
            <br>
            <div>
                <b>Reports To:</b> {{ $report->reportsTo }}
            </div>
        </section>

        <section class="content">
            <h2>I. Mission Statement:</h2>
            <p>{{ $report->missionStatement }}</p>
        </section>

        <section class="content">
        <h2>II. Strategic Goals</h2>
            <p><b>Strategic Goals Under Review:</b> {{ $report->strategicGoals['strategicGoalsUnderReview'] }}</p>
            <p><b>Implementation Plans:</b> {{ $report->strategicGoals['implmentationPlans'] }}</p>
            <p><b>Plans to Achieve Not Completed Goals:</b> {{ $report->strategicGoals['plansToAchieveNotCompletedGoals'] }}</p>
            <p><b>Strategic Goals:</b> {{ $report->strategicGoals['strategicGoals'] }}</p>
         </section>
        <section class="content">
            <h2>III. Accomplishments for the Reporting Period</h2>
            <p><b>Accomplishment List:</b> {{ $report->accomplishments['accomplishmentList'] }}</p>
            <p><b>Accomplishment Advancement:</b> {{ $report->accomplishments['accomplishmentAdvancement'] }}</p>
            <p><b>Impactful Change:</b> {{ $report->accomplishments['impactfulChange'] }}</p>
            <p><b>Why:</b> {{ $report->accomplishments['why'] }}</p>
            <p><b>Applicable Opportunities:</b> {{ $report->accomplishments['applicableOpportunities'] }}</p>
        </section>

        <section class="content">
            <h2>IV. Research & Partnerships</h2>
            <p><b>External Funding:</b> {{ $report->researchPartnerships['externalFunding'] }}</p>
            <p><b>Research Publications:</b> {{ $report->researchPartnerships['researchPublications'] }}</p>
            <p><b>Partnership Agencies:</b> {{ $report->researchPartnerships['partnershipAgencies'] }}</p>
            <p><b>Scholarships:</b> {{ $report->researchPartnerships['scholarships'] }}</p>
        </section>

        <section class="content">
            <h2>V. Student Success</h2>
            <p><b>Student Learning:</b> {{ $report->studentSuccess['studentLearning'] }}</p>
            <p><b>Student Clubs:</b> {{ $report->studentSuccess['studentClubs'] }}</p>
            <p><b>Student 1:</b> {{ $report->studentSuccess['student1'] }} <b>Reason:</b> {{ $report->studentSuccess['reason1'] }}</p>
            <p><b>Student 2:</b> {{ $report->studentSuccess['student2'] }} <b>Reason:</b> {{ $report->studentSuccess['reason2'] }}</p>
            <p><b>Student 3:</b> {{ $report->studentSuccess['student3'] }} <b>Reason:</b> {{ $report->studentSuccess['reason3'] }}</p>
        </section>

        <section class="content">
            <h2>VI. Activities for the Year</h2>
            @foreach ($report->activities as $activity)
                <p><b>Event Name:</b> {{ $activity['eventName'] }}</p>
                <p><b>Persons in Picture:</b> {{ $activity['personsInPicture'] }}</p>
                <p><b>Event Summary:</b> {{ $activity['eventSummary'] }}</p>
                <p><b>Event Month:</b> {{ $activity['eventMonth'] }}</p>
                @foreach($activity['pictureURL'] as $pictureURL)
                    <img src="{{ $pictureURL['eventPicture'] }}" alt="Event Picture" style="max-width: 100%; height: auto;">
                @endforeach
                
                
                <hr>
            @endforeach
        </section>

        <section class="content">
            <h2>VII. Administrative Department Data</h2>
            <p><b>Full-Time Staff:</b> {{ $report->administrativeData['fullTimeStaff'] }}</p>
            <p><b>Part-Time Staff:</b> {{ $report->administrativeData['partTimeStaff'] }}</p>
            <p><b>Significant Staff Changes:</b> {{ $report->administrativeData['significantStaffChanges'] }}</p>
        </section>

        <section class="content">
            <h2>VIII. Financial Budget</h2>
            <p><b>Funding Sources:</b> {{ $report->financialBudget['fundingSources'] }}</p>
            <p><b>Significant Budget Changes:</b> {{ $report->financialBudget['significantBudgetChanges'] }}</p>
        </section>

        <section class="content">
            <h2>IX. Division Meetings</h2>
            @foreach ($report->meetings as $meeting)
                <p><b>Meeting Type:</b> {{ $meeting['meetingType'] }}</p>
                <p><b>Meeting Date:</b> {{ $meeting['meetingDate'] }}</p>
                @if (!empty($meeting['meetingMinutesURL']))
                    <p><b>Meeting Minutes:</b> <a href="{{ $meeting['meetingMinutesURL'] }}" target="_blank">View Minutes</a></p>
                @endif
                <hr>
            @endforeach
        </section>

        <section class="content">
            <h2>X. Other Comments</h2>
            <p>{{ $report->otherComments }}</p>
        </section>

        <footer class="footer">
            <p>&copy; 2024 University of Belize. All Rights Reserved.</p>
        </footer>
    </div>
</body>
</html>
