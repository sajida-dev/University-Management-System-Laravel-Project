@extends('layouts.app')
@section('page-name', 'Instructions')
@section('admin-main')
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-12" class="card">
                <div class="card-header" style="display: flex; justify-content:space-between;">
                    <span class="card-title">
                        Welcome
                    </span>
                    {{-- <span>
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf

                            <div>
                                <x-primary-button>
                                    {{ __('Resend Verification Email') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </span> --}}
                </div>
                <div class="card-body show">
                    <div class="panel-content">
                        <h2
                            style="font-family: &quot;Playfair Display&quot;, Georgia, serif; line-height: 1.5; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; font-size: 30px; letter-spacing: normal;">
                            Instructions for Applicants</h2>
                        <p
                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 16px; letter-spacing: normal;">
                            <strong style="font-weight: bold;">INSTRUCTIONS TO&nbsp;APPLY&nbsp;FOR ONLINE ADMISSION</strong>
                        </p>
                        <table align="center" border="1" cellpadding="0" cellspacing="0"
                            style="border-spacing: 0px; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 16px; letter-spacing: normal;">
                            <tbody>
                                <tr>
                                    <td style="padding: 0px;">
                                        <p
                                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify;">
                                            <span style="color: rgb(255, 0, 0);"><strong style="font-weight: bold;"><em>The
                                                        applicants having 3</em></strong><strong
                                                    style="font-weight: bold;"><em><span
                                                            style="font-size: 12px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em;">rd</span></em></strong><strong
                                                    style="font-weight: bold;"><em>&nbsp;division (i.e. less than 45%
                                                        aggregate marks under annual system or less than 2.00 CGPA under
                                                        semester system or less than 60% marks under semester system (where
                                                        CGPA is not available/mentioned)) in the terminal degree are not
                                                        eligible for admission in any program.</em></strong></span>
                                        </p>
                                        <ul style="margin-bottom: 10px;">
                                            <li style="text-align: justify;"><span style="color: rgb(255, 0, 0);"><strong
                                                        style="font-weight: bold;">1</strong><strong
                                                        style="font-weight: bold;"><span
                                                            style="font-size: 12px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em;">st</span></strong><strong
                                                        style="font-weight: bold;">&nbsp;year passed students of FA / FSc or
                                                        equivalent are eligible to apply for admission in BS (4 years)
                                                        programs.</strong></span></li>
                                            <li style="text-align: justify;"><span style="color: rgb(255, 0, 0);"><strong
                                                        style="font-weight: bold;">The final year result awaited students of
                                                        FA / FSc or equivalent are required to enter 1</strong><strong
                                                        style="font-weight: bold;"><span
                                                            style="font-size: 12px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em;">st</span></strong><strong
                                                        style="font-weight: bold;">&nbsp;year marks (i.e. Obtained marks /
                                                        Total marks).</strong></span></li>
                                            <li style="text-align: justify;"><span style="color: rgb(255, 0, 0);"><strong
                                                        style="font-weight: bold;">The students with complete results of FA
                                                        / FSc or equivalent will enter their complete
                                                        result.</strong></span></li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div
                            style="color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 16px; letter-spacing: normal; clear: both;">
                            &nbsp;</div>
                        <p
                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 16px; letter-spacing: normal;">
                            &nbsp;</p>
                        <p
                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 16px; letter-spacing: normal;">
                            <strong style="font-weight: bold;">Step 1 (For all the Applicants)</strong>
                        </p>
                        <p
                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 16px; letter-spacing: normal;">
                            <strong style="font-weight: bold;">Please read the following instructions carefully before
                                filling the online admission application form.</strong>
                        </p>
                        <ol
                            style="margin-bottom: 10px; padding-left: 30px; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 16px; letter-spacing: normal;">
                            <li style="text-align: justify;">1. Download prospectus from&nbsp;<a
                                    href="https://www.ue.edu.pk/admissions/2024"
                                    style="color: rgb(43, 87, 64); transition: all 0.5s ease 0s;"><strong
                                        style="font-weight: bold;">https://www.ue.edu.pk/admissions/202</strong></a><strong
                                    style="font-weight: bold;">4</strong></li>
                            <li style="text-align: justify;"><strong style="font-weight: bold;">2. Please check your
                                    eligibility from the following URL</strong>&nbsp;<a
                                    href="https://www.ue.edu.pk/admissions/2024"
                                    style="color: rgb(43, 87, 64); transition: all 0.5s ease 0s;"><strong
                                        style="font-weight: bold;">https://www.ue.edu.pk/admissions/202</strong></a><strong
                                    style="font-weight: bold;">4</strong>&nbsp;<strong style="font-weight: bold;">before
                                    applying for admission.</strong></li>
                            <li style="text-align: justify;">3. Following documents will be required for completion of
                                online
                                admission form.<ol>
                                    <li style="text-align: justify;padding-left: 30px;">1.<strong
                                            style="font-weight: bold;">
                                            CNIC/B-Form</strong>&nbsp;of Candidate</li>
                                    <li style="text-align: justify;padding-left: 30px;">2.<strong
                                            style="font-weight: bold;">
                                            CNIC</strong>&nbsp;of Father/Guardian</li>
                                    <li style="text-align: justify;padding-left: 30px;">3.<strong
                                            style="font-weight: bold;">
                                            Certificates</strong>&nbsp;of Secondary School and
                                        Higher Secondary School</li>
                                    <li style="text-align: justify;padding-left: 30px;">4.<strong
                                            style="font-weight: bold;">
                                            Transcripts</strong>&nbsp;of ADP/Bachelor and Master
                                        programs (if applying for&nbsp;<strong style="font-weight: bold;">MS/MPhil/MBA
                                            program</strong>)</li>
                                    <li style="text-align: justify;padding-left: 30px;">5.<strong
                                            style="font-weight: bold;">
                                            Transcripts</strong>&nbsp;of ADP/Bachelor, Master and
                                        MS/MPhil programs (if applying for&nbsp;<strong style="font-weight: bold;">PhD
                                            program</strong>)</li>
                                    <li style="text-align: justify;padding-left: 30px;">6. Scanned photo in&nbsp;<strong
                                            style="font-weight: bold;">JPEG</strong>&nbsp;format upto&nbsp;<strong
                                            style="font-weight: bold;">50KB</strong>&nbsp;size.</li>
                                </ol>
                            </li>
                            <li style="text-align: justify;">4. Please note that after pressing the “<strong
                                    style="font-weight: bold;">Submit</strong>” button, applicant will not be able to edit
                                the followings; however, the rest of the fields available&nbsp;may be edited.<ol>
                                    <li style="text-align: justify;padding-left: 30px;">1. Campus/Division</li>
                                    <li style="text-align: justify;padding-left: 30px;">2. Degree Level</li>
                                    <li style="text-align: justify;padding-left: 30px;">3. Subject</li>
                                    <li style="text-align: justify;padding-left: 30px;">4. Shift</li>
                                    <li style="text-align: justify;padding-left: 30px;">5. Applicant's Name</li>
                                    <li style="text-align: justify;padding-left: 30px;">6. Applicant's CNIC</li>
                                    <li style="text-align: justify;padding-left: 30px;">7. Father's Name</li>
                                </ol>
                            </li>
                            <li style="text-align: justify;">5. Print the&nbsp;<strong style="font-weight: bold;">Fee
                                    Challan,&nbsp;</strong>deposit the prescribed admission processing fee in any branch of
                                The Bank of Punjab (BOP), and get computer generated deposit receipt (Customer Copy).</li>
                            <li style="text-align: justify;">6. <strong style="font-weight: bold;">Please note that printed
                                    application form / computer-generated deposit receipt (Customer copy) need&nbsp;not be
                                    submitted to the university but should be kept for record.&nbsp;</strong></li>
                            <li style="text-align: justify;">7. Only those applicants will be considered for admission who
                                have
                                deposited the prescribed admission processing fee (non-refundable).</li>
                            <li style="text-align: justify;">8. <strong style="font-weight: bold;">Submit separate online
                                    application forms for each campus/ program/ shift/ quota.</strong></li>
                            <li style="text-align: justify;">9. <strong style="font-weight: bold;">A separate admission
                                    processing fee(non-refundable) will be charged for each application form.</strong></li>
                            <li style="text-align: justify;">10. The applicants having unusual or non-standard
                                qualifications
                                (e.g. diploma, certificate, etc.) are required to seek equivalence (prior to applying online
                                for admission) from the Quality Enhancement Cell, University of Education, Lahore. They will
                                have to submit an equivalence form (which may be downloaded from the UE Website&nbsp;<strong
                                    style="font-weight: bold;">(i.e.&nbsp;</strong><a
                                    href="https://www.ue.edu.pk/admissions/2024"
                                    style="color: rgb(43, 87, 64); transition: all 0.5s ease 0s;"><strong
                                        style="font-weight: bold;">www.ue.edu.pk</strong></a><strong
                                    style="font-weight: bold;">)</strong>) in the Quality Enhancement Cell, University of
                                Education, College Road, Township, Lahore, and deposit the prescribed fee. For any query
                                regarding equivalence, please contact Quality Enhancement Cell at&nbsp;<strong
                                    style="font-weight: bold;">directorqec@ue.edu.pk</strong>.&nbsp;</li>
                            <li style="text-align: justify;">11. Merit Lists and Waiting List will be available on the
                                URL&nbsp;<a href="https://www.ue.edu.pk/admissions/2024"
                                    style="color: rgb(43, 87, 64); transition: all 0.5s ease 0s;"><strong
                                        style="font-weight: bold;">https://www.ue.edu.pk/admissions/202</strong></a><strong
                                    style="font-weight: bold;">4</strong>&nbsp;as per scheduled dates mentioned in the UE
                                Admission Calendar available in UE Prospectus as well as uploaded on the UE
                                website&nbsp;<strong style="font-weight: bold;">(</strong><a
                                    href="http://www.ue.edu.pk/admissions/2024" target="_blank"
                                    style="color: rgb(43, 87, 64); text-decoration-line: none; transition: all 0.5s ease 0s;"><strong
                                        style="font-weight: bold;">www.ue.edu.pk</strong></a><strong
                                    style="font-weight: bold;">)</strong></li>
                            <li style="text-align: justify;">12. For any kind of information, complaints, and queries,
                                regarding the online admission form, please contact the concerned Division/Campus on the
                                phone number given in the Advertisement/University Website/Prospectus. You may also contact
                                at the following email address.</li>
                        </ol>
                        <p
                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 16px; letter-spacing: normal;">
                            <strong style="font-weight: bold;">Email
                                Address:&nbsp;admissions@ue.edu.pk</strong>&nbsp;&nbsp;&nbsp;
                        </p>
                        <p
                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 16px; letter-spacing: normal;">
                            <strong style="font-weight: bold;">Step 2&nbsp;(For Successful Applicants i.e. applicants
                                appearing in Merit List)</strong>
                        </p>
                        <ol
                            style="margin-bottom: 10px; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 16px; letter-spacing: normal;">
                            <li style="text-align: justify;">The applicants, whose names are displayed in the merit lists,
                                will contact the Admission Incharge of the relevant Division/Campus, along with original
                                educational documents, CNIC/Form-B, and Father/Guardian CNIC, two sets of photocopies of all
                                these documents.</li>
                            <li style="text-align: justify;">After completion of the verification process, the Admission
                                Office of the concerned Division/Campus will issue a fee Challan for the deposit
                                of&nbsp;<strong style="font-weight: bold;">Admission dues (Semester fee)</strong>.</li>
                            <li style="text-align: justify;">The applicant will deposit the fee in any Branch of the Bank
                                of Punjab (BOP) within due dates and get the computer-generated deposit receipt (Customer
                                Copy); however, he/she needs not to submit the computer-generated deposit receipt (Customer
                                Copy) in the Division/Campus concerned but should be kept for record.</li>
                            <li style="text-align: justify;">If an applicant does not submit the&nbsp;<strong
                                    style="font-weight: bold;">Admission dues</strong>&nbsp;<strong
                                    style="font-weight: bold;">(Semester dues)</strong>&nbsp;within the due date, the
                                admission offer shall stand canceled.</li>
                        </ol>
                        <p
                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 16px; letter-spacing: normal;">
                            &nbsp;</p>
                        <p
                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 16px; letter-spacing: normal;">
                            <strong style="font-weight: bold;">Additional Instructions for Applicants of BS
                                Programs</strong>
                        </p>
                        <ol
                            style="margin-bottom: 10px; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 16px; letter-spacing: normal;">
                            <li style="text-align: justify;">1<span
                                    style="font-size: 12px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em;">st</span>&nbsp;year
                                (Part-I) passed students of FA/FSc/ICom/DCom/ICS or equivalent are eligible to apply for
                                admission in BS (4 years) programs; however, DAE students are eligible to apply for
                                admission, if they have passed 1<span
                                    style="font-size: 12px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em;">st</span>&nbsp;year
                                (Part-I) and 2<span
                                    style="font-size: 12px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em;">nd</span>&nbsp;year
                                (Part-II) examination.&nbsp;</li>
                            <li style="text-align: justify;">The 2<span
                                    style="font-size: 12px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em;">nd</span>&nbsp;year
                                (Part-II) result awaited students of FA/FSc/ICom/DCom/ICS or equivalent are required to
                                enter 1<span
                                    style="font-size: 12px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em;">st</span>&nbsp;year
                                (Part-I) marks (i.e. obtained marks &amp; Total marks in Part-I) and 3<span
                                    style="font-size: 12px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em;">rd</span>&nbsp;year
                                (Part-III) result awaited students of DAE are required to enter 2<span
                                    style="font-size: 12px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em;">nd</span>&nbsp;years
                                marks (i.e., obtained marks &amp; total marks of both parts (Part-I + Part-II)).</li>
                            <li style="text-align: justify;">The students with complete results of FA/FSc/DAE/ICom/DCom/ICS
                                or equivalent will enter their complete result (i.e. obtained marks &amp; total marks).</li>
                        </ol>
                        <p
                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 16px; letter-spacing: normal;">
                            <strong style="font-weight: bold;">Disclaimer:</strong>
                        </p>
                        <ol
                            style="margin-bottom: 10px; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 16px; letter-spacing: normal;">
                            <li style="text-align: justify;">The students whose any paper of 1<span
                                    style="font-size: 12px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em;">st</span>&nbsp;year
                                (Part-I) in FA/FSc/ICom/DCom/ICS or equivalent and 1<span
                                    style="font-size: 12px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em;">st</span>&nbsp;/
                                2<span
                                    style="font-size: 12px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em;">nd</span>&nbsp;year
                                (Part-I / II) in DAE or equivalent is failed (supply), are&nbsp;<strong
                                    style="font-weight: bold;">not eligible to apply</strong>&nbsp;for admission.</li>
                            <li style="text-align: justify;">The admission (if secured) of result awaited students will be
                                provisional until they pass their complete examination (All papers of all Parts) in the
                                Annual 2024. The admission of students who failed as a whole/failed in any paper (Supply
                                holders) will be&nbsp;<strong style="font-weight: bold;">canceled/withdrawn</strong>.
                                In&nbsp;<strong style="font-weight: bold;">such cases&nbsp;deposited fee shall be
                                    considered consumed.</strong></li>
                        </ol>
                        <p
                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 16px; letter-spacing: normal;">
                            <img src="https://ue.edu.pk/admissions/2024/images/pic3f24.jpg" alt="instructions"
                                style="border: 0px; width: 847.5px;">
                        </p>
                        <p
                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 16px; letter-spacing: normal;">
                            <strong style="font-weight: bold;">Additional Instructions for Applicants of BS Post AD
                                Programs</strong>
                        </p>
                        <p
                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 16px; letter-spacing: normal;">
                            For admission in BS Post ADP programs, the result awaiting candidates of the Associate Degree
                            may apply on the basis of the results of their first three semesters / Annual Part-I of
                            Associate Degree Program.</p>
                        <ol
                            style="margin-bottom: 10px; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 16px; letter-spacing: normal;">
                            <li style="text-align: justify;">The applicants will have to enter the result of 4 semesters of
                                the AD program or 3 semesters, whichever is complete. However, only such students will be
                                eligible for admission who have passed all the courses.</li>
                            <li style="text-align: justify;">After admission, applicants with 3 semesters' results of their
                                AD program will provide their final result within 4 weeks of the commencement of the
                                classes.</li>
                            <li style="text-align: justify;">In case of failure in the final result of the Associate Degree
                                Program, the admission of such applicants will stand cancelled.</li>
                        </ol>
                        <p
                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 16px; letter-spacing: normal;">
                            <strong style="font-weight: bold;">Additional Instructions for Applicants of MS/MPhil/MBA and
                                PhD Programs</strong>
                        </p>
                        <ol style="margin-bottom: 10px;">
                            <li
                                style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 16px; letter-spacing: normal; color: rgb(68, 68, 68); text-align: justify;">
                                Entry Tests for MS/MPhil/ MBA &amp; PhD will be conducted 3 times on different dates before
                                the commencement of admissions in Fall 2024.</li>
                            <li
                                style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 16px; letter-spacing: normal; color: rgb(68, 68, 68); text-align: justify;">
                                The validity of the test will only be the upcoming Admissions (i.e. Fall 2024).</li>
                            <li
                                style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 16px; letter-spacing: normal; color: rgb(68, 68, 68); text-align: justify;">
                                Newcomers and repeat test takers can apply to retake the entry test after depositing the
                                fee.</li>
                            <li
                                style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 16px; letter-spacing: normal; text-align: justify;">
                                <font color="#ff0000"><b>The applicants of MS/MPhil programs are required to pass the UE
                                        Entry Test {Subject (70%) +&nbsp;<span style="font-weight: bolder;">GAT
                                            General</span>&nbsp;(30%)} administered by the UE Entry Test Committee with a
                                        minimum of 50% marks. Moreover, the applicants holding valid Graduate Record
                                        Examination (GRE)/HAT /Equivalent Tests&nbsp;accredited by HEC&nbsp;will be exempted
                                        from the UE Entry Test.</b></font>
                            </li>
                            <li style="text-align: justify;">
                                <font color="#ff0000" style="">
                                    <font face="Open Sans, Arial, sans-serif"><span
                                            style="font-size: 16px; letter-spacing: normal;"><b>The applicants of the MBA
                                                program are required to pass the UE Entry Test GAT General
                                                based&nbsp;administered by the UE Entry Test Committee with a minimum of 50%
                                                marks. Moreover, the applicants holding valid Graduate Record Examination
                                                (GRE)/HAT /Equivalent Tests&nbsp;accredited by HEC&nbsp;will be exempted
                                                from the UE Entry Test.</b></span></font>
                                </font>
                            </li>
                            <li style="text-align: justify;">
                                <font color="#ff0000" style=""><b
                                        style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 16px; letter-spacing: normal;">The
                                        applicants of the PhD programs are required to pass the </b>
                                    <font face="Open Sans, Arial, sans-serif"><span
                                            style="font-size: 16px; letter-spacing: normal;"><b>UE Entry Test GAT General
                                            </b></span></font><b
                                        style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 16px; letter-spacing: normal;">administered
                                        by the UE Entry Test Committee with a minimum of 60% marks. Moreover, the applicants
                                        holding valid Graduate Record Examination (GRE)/HAT /Equivalent
                                        Tests&nbsp;accredited by HEC&nbsp;will be exempted from the UE Entry Test.</b>
                                </font>
                            </li>
                            <li
                                style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 16px; letter-spacing: normal; color: rgb(68, 68, 68); text-align: justify;">
                                The UE Entry Tests will be organized/held three times as per the following schedule:</li>
                        </ol>
                        <table align="center" border="1" cellpadding="0" cellspacing="0"
                            style="border-spacing: 0px; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 16px; letter-spacing: normal; width: 830.2px;">
                            <tbody>
                                <tr>
                                    <td style="padding: 0px; height: 67px; width: 129.212px;">
                                        <p
                                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify;">
                                            June</p>
                                    </td>
                                    <td style="padding: 0px; height: 67px; width: 83.4375px;">
                                        <p
                                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify;">
                                            10</p>
                                    </td>
                                    <td style="padding: 0px; height: 67px; width: 138px;">
                                        <p
                                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify;">
                                            Monday</p>
                                    </td>
                                    <td style="padding: 0px; height: 67px; width: 478.75px;">
                                        <p
                                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify;">
                                            Last date for submission of admission applications for 1<span
                                                style="font-size: 12px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em;">st</span>&nbsp;UE
                                            Entry Test of MS/MPhil/MBA and PhD applicants</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0px; height: 59px; width: 129.212px;">
                                        <p
                                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify;">
                                            June</p>
                                    </td>
                                    <td style="padding: 0px; height: 59px; width: 83.4375px;">
                                        <p
                                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify;">
                                            13</p>
                                    </td>
                                    <td style="padding: 0px; height: 59px; width: 138px;">
                                        <p
                                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify;">
                                            Thursday</p>
                                    </td>
                                    <td style="padding: 0px; height: 59px; width: 478.75px;">
                                        <p
                                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify;">
                                            1<span
                                                style="font-size: 12px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em;">st</span>&nbsp;UE
                                            Entry Test for MS/MPhil/MBA and PhD applicants in respective Division/Campus</p>
                                        <p
                                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify;">
                                            &nbsp;</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0px; height: 48px; width: 129.212px;">
                                        <p
                                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify;">
                                            June</p>
                                    </td>
                                    <td style="padding: 0px; height: 48px; width: 83.4375px;">
                                        <p
                                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify;">
                                            15</p>
                                    </td>
                                    <td style="padding: 0px; height: 48px; width: 138px;">
                                        <p
                                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify;">
                                            Saturday</p>
                                    </td>
                                    <td style="padding: 0px; height: 48px; width: 478.75px;">
                                        <p
                                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify;">
                                            Declaration of Result of 1<span
                                                style="font-size: 12px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em;">st</span>&nbsp;UE
                                            Entry Test for MS/MPhil/MBA and PhD applicants</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0px; height: 67px; width: 129.212px;">
                                        <p
                                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify;">
                                            June</p>
                                    </td>
                                    <td style="padding: 0px; height: 67px; width: 83.4375px;">
                                        <p
                                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify;">
                                            21</p>
                                    </td>
                                    <td style="padding: 0px; height: 67px; width: 138px;">
                                        <p
                                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify;">
                                            Friday</p>
                                    </td>
                                    <td style="padding: 0px; height: 67px; width: 478.75px;">
                                        <p
                                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify;">
                                            Last date for submission of admission applications for 2<span
                                                style="font-size: 12px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em;">nd</span>&nbsp;UE
                                            Entry Test of MS/MPhil/MBA and PhD applicants</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0px; height: 66px; width: 129.212px;">
                                        <p
                                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify;">
                                            June</p>
                                    </td>
                                    <td style="padding: 0px; height: 66px; width: 83.4375px;">
                                        <p
                                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify;">
                                            24</p>
                                    </td>
                                    <td style="padding: 0px; height: 66px; width: 138px;">
                                        <p
                                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify;">
                                            Monday</p>
                                    </td>
                                    <td style="padding: 0px; height: 66px; width: 478.75px;">
                                        <p
                                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify;">
                                            2<span
                                                style="font-size: 12px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em;">nd</span>&nbsp;UE
                                            Entry Test for MS/MPhil/MBA and PhD applicants</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0px; height: 66px; width: 129.212px;">
                                        <p
                                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify;">
                                            June</p>
                                    </td>
                                    <td style="padding: 0px; height: 66px; width: 83.4375px;">
                                        <p
                                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify;">
                                            26</p>
                                    </td>
                                    <td style="padding: 0px; height: 66px; width: 138px;">
                                        <p
                                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify;">
                                            Wednesday</p>
                                    </td>
                                    <td style="padding: 0px; height: 66px; width: 478.75px;">
                                        <p
                                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify;">
                                            Declaration of Result of 2<span
                                                style="font-size: 12px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em;">nd</span>&nbsp;UE
                                            Entry Test for MS/MPhil/MBA and PhD applicants</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0px; height: 59px; width: 129.212px;">
                                        <p
                                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify;">
                                            July</p>
                                    </td>
                                    <td style="padding: 0px; height: 59px; width: 83.4375px;">
                                        <p
                                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify;">
                                            05</p>
                                    </td>
                                    <td style="padding: 0px; height: 59px; width: 138px;">
                                        <p
                                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify;">
                                            Friday</p>
                                    </td>
                                    <td style="padding: 0px; height: 59px; width: 478.75px;">
                                        <p
                                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify;">
                                            Last date for submission of admission applications for 3<span
                                                style="font-size: 12px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em;">rd</span>&nbsp;UE
                                            Entry Test of MS/MPhil/MBA and PhD applicants</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0px; height: 59px; width: 129.212px;">
                                        <p
                                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify;">
                                            July</p>
                                    </td>
                                    <td style="padding: 0px; height: 59px; width: 83.4375px;">
                                        <p
                                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify;">
                                            08</p>
                                    </td>
                                    <td style="padding: 0px; height: 59px; width: 138px;">
                                        <p
                                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify;">
                                            Monday</p>
                                    </td>
                                    <td style="padding: 0px; height: 59px; width: 478.75px;">
                                        <p
                                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify;">
                                            3<span
                                                style="font-size: 12px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em;">rd</span>&nbsp;UE
                                            Entry Test for MS/MPhil/MBA and PhD applicants&nbsp;</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0px; height: 48px; width: 129.212px;">
                                        <p
                                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify;">
                                            July</p>
                                    </td>
                                    <td style="padding: 0px; height: 48px; width: 83.4375px;">
                                        <p
                                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify;">
                                            10</p>
                                    </td>
                                    <td style="padding: 0px; height: 48px; width: 138px;">
                                        <p
                                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify;">
                                            Wednesday</p>
                                    </td>
                                    <td style="padding: 0px; height: 48px; width: 478.75px;">
                                        <p
                                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify;">
                                            Declaration of Result of 3<span
                                                style="font-size: 12px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em;">rd</span>&nbsp;UE
                                            Entry Test for MS/MPhil/MBA and PhD applicants</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0px; height: 48px; width: 129.212px;"><span
                                            style="text-align: justify;">July</span><br></td>
                                    <td style="padding: 0px; height: 48px; width: 83.4375px;">15</td>
                                    <td style="padding: 0px; height: 48px; width: 138px;"><span
                                            style="text-align: justify;">Monday</span><br></td>
                                    <td style="padding: 0px; height: 48px; width: 478.75px;">Last date for submission of
                                        admission applications for 4th UE Entry Test of MS/MPhil/MBA and PhD applicants<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0px; height: 48px; width: 129.212px;"><span
                                            style="text-align: justify;">July</span><br></td>
                                    <td style="padding: 0px; height: 48px; width: 83.4375px;">19</td>
                                    <td style="padding: 0px; height: 48px; width: 138px;"><span
                                            style="text-align: justify;">Friday</span><br></td>
                                    <td style="padding: 0px; height: 48px; width: 478.75px;">4th UE Entry Test for
                                        MS/MPhil/MBA and PhD applicants<br></td>
                                </tr>
                            </tbody>
                        </table>
                        <div
                            style="color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 16px; letter-spacing: normal; clear: both;">
                            &nbsp;</div>
                        <p
                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 16px; letter-spacing: normal;">
                            &nbsp;</p>
                        <ol
                            style="margin-bottom: 10px; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 16px; letter-spacing: normal;">
                            <li style="text-align: justify;">If any applicant appeared twice/thrice in the UE Entry Test
                                and remained successful each time, then only the highest marks may be considered in
                                calculation of his/her merit.</li>
                            <li style="text-align: justify;">After completing three-layered UE Entry Tests for MS/MPhil/MBA
                                and PhD programs, consolidated Merit Lists may be displayed.</li>
                            <li style="text-align: justify;">The applicant has to select a test centre&nbsp;<strong
                                    style="font-weight: bold;">where he/she is interested in applying for
                                    admission</strong>&nbsp;of the&nbsp;<strong style="font-weight: bold;">MS/MPhil and
                                    PhD</strong>&nbsp;program.</li>
                            <li style="text-align: justify;">The successful applicants of&nbsp;<strong
                                    style="font-weight: bold;">PhD programs&nbsp;</strong>will appear for the interview at
                                the concerned UE Division/Campus (where applied for admission) on&nbsp;<strong
                                    style="font-weight: bold;">July 22, 2024, at their concerned UE
                                    Division/Campus).</strong><br></li>
                            <li style="text-align: justify;">After the interview,&nbsp;<strong
                                    style="font-weight: bold;">1<span
                                        style="font-size: 12px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em;">st</span>&nbsp;merit
                                    list&nbsp;</strong>will be displayed on the University Website on&nbsp;<strong
                                    style="font-weight: bold;">July 23, 2024</strong>.</li>
                        </ol>
                        <p
                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 16px; letter-spacing: normal;">
                            Note:</p>
                        <ol
                            style="margin-bottom: 10px; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 16px; letter-spacing: normal;">
                            <li style="text-align: justify;">The students whose any paper of 1st year/2nd year of FA/FSC/
                                DAE or equivalent is failed, are not eligible for admission.</li>
                            <li style="text-align: justify;">The admission of result awaited students will be provisional
                                until they pass their complete examination in Annual 2024.</li>
                            <li style="text-align: justify;">The provisionally admitted students, fail in the Annual 2024
                                examination, their admission will be canceled and the deposited fee shall be considered
                                consumed.</li>
                            <li style="text-align: justify;">Any forgery in transcripts or tampering in marks will result
                                in cancellation of the application at any stage even after the admission and this will make
                                the applicant ineligible for a lifetime for admission at the University of Education,
                                Lahore.</li>
                        </ol>
                        <p
                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 16px; letter-spacing: normal;">
                            &nbsp;</p>
                        <p
                            style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; text-align: justify; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 16px; letter-spacing: normal;">
                            Note:</p>
                        <ol
                            style="margin-bottom: 10px; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 16px; letter-spacing: normal;">
                            <li style="text-align: justify;">The students whose any paper of 1st year/2nd year of FA/FSC/
                                DAE or equivalent is failed, are not eligible for admission.</li>
                            <li style="text-align: justify;">Any forgery in transcripts or tampering in marks will result
                                in cancellation of the application at any stage even after the admission and this will make
                                the applicant ineligible for a lifetime of admission at the University of Education, Lahore.
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
