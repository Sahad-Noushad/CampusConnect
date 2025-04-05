<?php
session_start();
include_once "../../connect.php";
    $regno=$_SESSION['idno'];
    $sql="SELECT syear,scourse FROM student WHERE sregno='$regno' AND sapprove='1'";
    $res=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($res);
    $_SESSION['year']=$year=$row['syear'];
    $_SESSION['course']=$course=$row['scourse'];
    $sem=$_POST['option_value'];

    #2021

    if($year=='2021'){

        #cs

        if($course=='cs'){
            if($sem=='1'){
                echo "
                <option value=\"\" selected disabled hidden>Select subject</option>
                <option value=\"eng\">Speaking and Listening skills</option>
                <option value=\"math\">Mathematics I</option>
                <option value=\"cfp\">Computer Fundamentals and Programming in C</option>
                <option value=\"de\">Digital Electronics</option>
                <option value=\"ve\">Value Education</option>
                ";
            }
            elseif ($sem=='2'){
                echo "
                <option value=\"\" selected disabled hidden>Select subject</option>
                <option value=\"eng\">Writing and Presentation Skills</option>
                <option value=\"math\">Mathematics II</option>
                <option value=\"evs\">Environmental Studies</option>
                <option value=\"ds\">Data Structures</option>
                <option value=\"cam\">Computer Architecture and Microprocessors</option>
                ";
            }
            elseif ($sem=='3'){
                echo "
                <option value=\"\" selected disabled hidden>Select subject</option>
                <option value=\"java\">Programming in Java</option>
                <option value=\"se\">Software Engineering</option>
                <option value=\"os\">Operating Systems</option>
                <option value=\"dbms\">Database Management Systems</option>
                <option value=\"daa\">Design and Analysis of Algorithms</option>
                ";
            }
            elseif ($sem=='4'){
                echo "
                <option value=\"\" selected disabled hidden>Select subject</option>
                <option value=\"ss\">System Software</option>
                <option value=\"wpp\">Web Programming and PHP</option>
                <option value=\"cn\">Computer Networks and Security</option>
                <option value=\"cg\">Computer Graphics</option>
                ";
            }
            elseif ($sem=='5'){
                echo "
                <option value=\"\" selected disabled hidden>Select subject</option>
                <option value=\"python\">Python Programming</option>
                <option value=\"ai\">Artificial Intelligence</option>
                <option value=\"foss\">Free and Open Source Software</option>
                <optgroup label=\"Elective\">
                    <option values=\"ooad\">Object Oriented Analysis and Design</option>
                    <option values=\"es\">Embedded Systems</option>
                    <option values=\"cc\">Cloud Computing</option>
                </optgroup>
                ";
            }
            elseif ($sem=='6'){
                echo "
                <option value=\"\" selected disabled hidden>Select subject</option>
                <option value=\"da\">Data Analytics</option>
                <option value=\"iot\">Internet of Things (IoT)</option>
                <option value=\"cs\">Cyber Security </option>
                <optgroup label=\"Elective\">
                    <option values=\"ml\">Machine Learning</option>
                    <option values=\"bct\">Block chain Technology</option>
                    <option values=\"dm\">Digital Marketing</option>
                </optgroup>
                ";
            }
        }

        #electronics

        elseif($course=='ele'){
            if ($sem=='1') {
                echo "
                    <option value=\"\" selected disabled hidden>Select subject</option>
                    <option value=\"eng\">English I Listening and Speaking Skills</option>
                    <option value=\"evs\">Environmental Studies</option>
                    <option value=\"be\">Basic Electrical and Electronics Engg.</option>
                    <option value=\"de\">Digital Electronics</option>
                ";
            }
            elseif($sem=='2'){
                echo "
                    <option value=\"\" selected disabled hidden>Select subject</option>
                    <option value=\"eng\">English II Writing and Presentation Skills</option>
                    <option value=\"sse\">Solid State Electronics</option>
                    <option value=\"na\">Network Analysis</option>
                    <option value=\"c\">Programming in C</option>
                ";
            }
            elseif($sem=='3'){
                echo "
                    <option value=\"\" selected disabled hidden>Select subject</option>
                    <option value=\"ec\">Electronic Circuits</option>
                    <option value=\"ce\">Communication Engineering</option>
                    <option value=\"mi\">Microprocessor and Interfacing</option>
                    <option value=\"co\">Computer Organization</option>
                ";
            }
            elseif($sem=='4'){
                echo "
                    <option value=\"\" selected disabled hidden>Select subject</option>
                    <option value=\"aet\">Applied Electro-magnetic Theory</option>
                    <option value=\"lic\">Linear Integrated Circuits</option>
                    <option value=\"ei\">Electronic Instrumentation</option>
                    <option value=\"ma\">Microcontrollers and applications</option>
                    <optgroup label=\"Elective\">
                        <option values=\"pmc\">Principles of Mobile Communication</option>
                        <option values=\"pm\">Principles of Management</option>
                    </optgroup>
                ";
            }
            elseif($sem=='5'){
                echo "
                    <option value=\"\" selected disabled hidden>Select subject</option>
                    <option value=\"dsp\">Digital Signal Processing</option>
                    <option value=\"dc\">Digital Communication </option>
                    <option value=\"cn\">Computer Networks</option>
                ";
            }
            elseif($sem=='6'){
                echo "
                    <option value=\"\" selected disabled hidden>Select subject</option>
                    <option value=\"oc\">Optical Communication</option>
                    <option value=\"be\">Biomedical Engineering</option>
                    <option value=\"nano\">Nanoelectronics</option>
                    <optgroup label=\"Elective\">
                        <option values=\"iot\">Internet of Things and applications</option>
                        <option values=\"me\">Microwave Engineering</option>
                    </optgroup>
                ";
            }
        }

        #maths

        elseif($course=='math'){
            if ($sem=='1') {
                echo "
                    <option values=\"\" selected disabled hidden>Select subject</option>
                    <option values=\"mm\">Methods of Mathematics</option>
                ";
            }
            elseif($sem=='2'){
                echo "
                    <option values=\"\" selected disabled hidden>Select subject</option>
                    <option values=\"fm\">Foundations of Mathematics</option>
                ";
            }
            elseif($sem=='3'){
                echo "
                    <option values=\"\" selected disabled hidden>Select subject</option>
                    <option values=\"emt\">Elementary Number Theory and Calculus - I</option>
                ";
            }
            elseif($sem=='4'){
                echo "
                    <option values=\"\" selected disabled hidden>Select subject</option>
                    <option values=\"emt\">Elementary Number Theory and Calculus - II</option>
                ";
            }
            elseif($sem=='5'){
                echo "
                    <option values=\"\" selected disabled hidden>Select subject</option>
                    <option values=\"ra\">Real Analysis - I</option>
                    <option values=\"ca\">Complex Analysis - I</option>
                    <option values=\"aa\">Abstract Algebra - Group Theory</option>
                    <option values=\"de\">Differential Equations</option>
                    <option values=\"ms\">Mathematics Software</option>
                ";
            }
            elseif($sem=='6'){
                echo "
                    <option values=\"\" selected disabled hidden>Select subject</option>
                    <option values=\"ra\">Real Analysis - II</option>
                    <option values=\"ca\">Complex Analysis - II</option>
                    <option values=\"aa\">Abstract Algebra - Ring Theory</option>
                    <option values=\"la\">Linear Algebra</option>
                    <option values=\"it\">Integral Transforms</option>
                    <optgroup label=\"Elective\">
                        <option value=\"gt\">Graph Theory</option>
                        <option value=\"lp\">Linear Programming with SageMath</option>
                        <option value=\"na\">Numerical Analysis with SageMath</option>
                        <option value=\"fm\">Fuzzy Mathematics</option>
                    </optgroup>
                ";
            }
        }

        #imb

        elseif ($course=='imb'){
            if ($sem=='1') {
                echo "
                    <option value=\"\" selected disabled hidden>Select subject</option>
                    <option value=\"eng\">English-I</option>
                    <optgroup label=\"Additional Language-I\">
                        <option value=\"mal\">Malayalam</option>
                        <option value=\"hindi\">Hindi</option>
                    </optgroup>
                    <option value=\"biom\">Biomolecules</option>
                    <option value=\"fom\">Fundamentals of Microbiology</option>
                    <option value=\"chem\">Chemistry-I</option>
                ";
            }
            elseif($sem=='2'){
                echo "
                    <option value=\"\" selected disabled hidden>Select subject</option>
                    <option value=\"eng\">English-II</option>
                    <optgroup label=\"Additional Language-I\">
                        <option value=\"mal\">Malayalam</option>
                        <option value=\"hindi\">Hindi</option>
                    </optgroup>
                    <option value=\"evs\">Environmental Studies</option>
                    <option value=\"mtp\">Microbial Taxonomy and Physiology</option>
                    <option value=\"chem\">Chemistry-II</option>
                ";
            }
            elseif($sem=='3'){
                echo "
                    <option value=\"\" selected disabled hidden>Select subject</option>
                    <option value=\"eng\">English-III</option>
                    <option value=\"abb\">Analytical Biochemistry and Biophysical</option>
                    <option value=\"cb\">Cell Biology</option>
                    <option value=\"mgb\">Microbial genetics and biotechnology</option>
                    <option value=\"chem\">Chemistry-III</option>
                ";
            }
            elseif($sem=='4'){
                echo "
                    <option value=\"\" selected disabled hidden>Select subject</option>
                    <option value=\"eng\">English-IV</option>
                    <option value=\"pab\">Physiological aspects of Biochemistry and Enzymology</option>
                    <option value=\"evm\">Environmental Microbiology</option>
                    <option value=\"fm\">Food Microbiology</option>
                    <option value=\"chem\">Chemistry-IV</option>
                ";
            }
            elseif($sem=='5'){
                echo "
                    <option value=\"\" selected disabled hidden>Select subject</option>
                    <option value=\"mb\">Molecular Biology</option>
                    <option value=\"fs\">Food Science</option>
                    <option value=\"ft\">Fermentation Technology</option>
                ";
            }
            elseif($sem=='6'){
                echo "
                    <option value=\"\" selected disabled hidden>Select subject</option>
                    <option value=\"cb\">Clinical Biochemistry</option>
                    <option value=\"m\">Metabolism</option>
                    <option value=\"ab\">Advanced Biochemistry</option>
                    <option value=\"mm\">Medical Microbiology</option>
                    <optgroup label=\"Elective\">
                        <option value=\"imm\">Immunology</option>
                    </optgroup>
                ";
            }
        }

        #bcom

        elseif ($course=='bcom'){
            if ($sem=='1') {
                echo "
                    <option value=\"\" selected disabled hidden>Select subject</option>
                    <option value=\"eng\">English I</option>
                    <option value=\"iot\">Introduction to IT</option>
                    <option value=\"mpb\">Methodology and Perspectives of Business Education</option>
                    <option value=\"evs\">Environmental studies</option>
                    <option value=\"mct\">MANAGEMENT CONCEPTS AND THOUGHT</option>
                    <option value=\"me\">MANAGERIAL ECONOMICS</option>
                ";
            }
            elseif($sem=='2'){
                echo "
                    <option value=\"\" selected disabled hidden>Select subject</option>
                    <option value=\"eng\">English II</option>
                    <option value=\"fm\">FINANCIAL MANAGEMENT</option>
                    <option value=\"icl\">INFORMATICS AND CYBER LAWS</option>
                    <option value=\"fa\">FINANCIAL ACCOUNTING</option>
                    <option value=\"brf\">BUSINESS REGULATORY FRAMEWORK</option>
                    <option value=\"bm\">BUSINESS MATHEMATICS</option>
                ";
            }
            elseif($sem=='3'){
                echo "
                    <option value=\"\" selected disabled hidden>Select subject</option>
                    <option value=\"pf\">PROJECT FINANCE</option>
                    <option value=\"ed\">ENTREPRENEURSHIP DEVELOPMENT</option>
                    <option value=\"afa\">ADVANCED FINANCIAL ACCOUNTING</option>
                    <option value=\"ca\">COMPANY ADMINISTRATION</option>
                    <option value=\"cap\">COMPUTER APPLICATION FOR PUBLICATIONS</option>
                    <option value=\"eb\">E-Business</option>
                ";
            }
            elseif($sem=='4'){
                echo "
                    <option value=\"\" selected disabled hidden>Select subject</option>
                    <option value=\"fsi\">FINANCIAL SERVICES IN INDIA</option>
                    <option value=\"ifm\">INDIAN FINANCIAL MARKET</option>
                    <option value=\"bai\">BANKING AND INSURANCE</option>
                    <option value=\"ca\">CORPORATE ACCOUNTING</option>
                    <option value=\"sfdm\">SOFTWARE FOR DATA MANAGEMENT</option>
                    <option value=\"bs\">BUSINESS STATISTICS</option>
                ";
            }
            elseif($sem=='5'){
                echo "
                    <option value=\"\" selected disabled hidden>Select subject</option>
                    <option value=\"fit\">FUNDAMENTALS OF INCOME TAX</option>
                    <option value=\"ca\">COST ACCOUNTING</option>
                    <option value=\"mm\">MARKETING MANAGEMENT</option>
                    <option value=\"wdp\">WEB DESIGNING AND PRODUCTION FOR BUSINESS</option>
                ";
            }
            elseif($sem=='6'){
                echo "
                    <option value=\"\" slected disaled hidden>Select subject</option>
                    <option value=\"aud\">AUDITING</option>
                    <option value=\"ac\">APPLIED COSTING</option>
                    <option value=\"mc\">MANAGEMENT ACCOUNTING</option>
                    <option value=\"ca\">COMPUTERISED ACCOUNTING</option>
                ";
            }
        }

        #english

        elseif ($course=='english') {
            if ($sem=='1') {
                echo "
                    <option values=\"\" selected hidden disabled>Select subject</option>
                    <option values=\"eng\">Language Course (English):Language Skills</option>
                    <optgroup label=\"Language Course 2\">
                        <option values=\"hindi\">Hindi</option>
                        <option values=\"mal\">Malayalam</option>
                    </optgroup>
                    <option values=\"ils1\">Introduction to Literary Studies I</option>
                    <option values=\"ils2\">Introduction to Literary Studies II</option>
                    <option values=\"fmc\">Fundamentals of Mass Communication</option>
                    <option values=\"bi\">Basics of Informatics</option>
                ";
            }
            elseif($sem=='2'){
                echo "
                    <option values=\"\" selected hidden disabled>Select subject</option>
                    <option values=\"eng\">Language Course (English):Writings on Contemporary Issues</option>
                    <optgroup label=\"Language Course 2\">
                        <option values=\"hindi\">Hindi</option>
                        <option values=\"mal\">Malayalam</option>
                    </optgroup>
                    <option values=\"evs\">Environmental Studies and Disaster Management</option>
                    <option values=\"plc\">Popular Literature and Culture</option>
                    <option values=\"ala\">Art and Literary Aesthetics</option>
                    <option values=\"pmp\">Print Media Practices-I</option>
                    <option values=\"mh\">Media History</option>
                ";
            }
            elseif($sem=='3'){
                echo "
                    <option values=\"\" selected hidden disabled>Select subject</option>
                    <option values=\"eng\">Language Course (English):English for Career</option>
                    <option values=\"bl\">British Literature</option>
                    <option values=\"eel\">Evolution of the English Language</option>
                    <option values=\"pmp\">Print Media Practices-II</option>
                    <option values=\"vm\">Visual Media:Television and Cinema</option>
                ";
            }
            elseif($sem=='4'){
                echo "
                    <option values=\"\" selected hidden disabled>Select subject</option>
                    <option values=\"eng\">Language Course (English):Readings in Literature</option>
                    <option values=\"wl\">World Literatures</option>
                    <option values=\"nr\">Narratives of Resistance</option>
                    <option values=\"trc\">Theories and Research Methods of Mass Communication</option>
                    <option values=\"pra\">Public Relations and Advertising</option>
                ";
            }
            elseif($sem=='5'){
                echo "
                    <option values=\"\" selected hidden disabled>Select subject</option>
                    <option values=\"ts\">Translation Studies</option>
                    <option values=\"ct\">Criticism and Theory</option>
                    <option values=\"rb\">Radio Broadcasting</option>
                    <option values=\"mle\">Media Laws and Ethics</option>
                    <option values=\"dm\">Digital Media - Basic Theories and Practice</option>
                ";
            }
            elseif($sem=='6'){
                echo "
                    <option values=\"\" selected hidden disabled>Select subject</option>
                    <option values=\"em\">English for the Media</option>
                    <option values=\"lse\">Linguistics and Structure of English Language</option>
                    <option values=\"cw\">Creative Writing</option>
                    <option values=\"ms\">Media and Society</option>
                ";
            }
        }
    }

    #2022

    elseif($year=='2022'){

        #cs

        if ($course=='cs') {
            if($sem=='1'){
                echo "
                <option value=\"\" selected disabled hidden>Select subject</option>
                <option value=\"eng\">Speaking and Listening skills</option>
                <option value=\"math\">Mathematics I</option>
                <option value=\"cfp\">Computer Fundamentals and Programming in C</option>
                <option value=\"de\">Digital Electronics</option>
                <option value=\"ve\">Value Education</option>
                ";
            }
            elseif ($sem=='2'){
                echo "
                <option value=\"\" selected disabled hidden>Select subject</option>
                <option value=\"eng\">Writing and Presentation Skills</option>
                <option value=\"math\">Mathematics II</option>
                <option value=\"evs\">Environmental Studies</option>
                <option value=\"ds\">Data Structures</option>
                <option value=\"cam\">Computer Architecture and Microprocessors</option>
                ";
            }
            elseif ($sem=='3'){
                echo "
                <option value=\"\" selected disabled hidden>Select subject</option>
                <option value=\"java\">Programming in Java</option>
                <option value=\"se\">Software Engineering</option>
                <option value=\"os\">Operating Systems</option>
                <option value=\"dbms\">Database Management Systems</option>
                <option value=\"daa\">Design and Analysis of Algorithms</option>
                ";
            }
            elseif ($sem=='4'){
                echo "
                <option value=\"\" selected disabled hidden>Select subject</option>
                <option value=\"ss\">System Software</option>
                <option value=\"wpp\">Web Programming and PHP</option>
                <option value=\"cn\">Computer Networks and Security</option>
                <option value=\"cg\">Computer Graphics</option>
                ";
            }
            elseif ($sem=='5'){
                echo "
                <option value=\"\" selected disabled hidden>Select subject</option>
                <option value=\"python\">Python Programming</option>
                <option value=\"ai\">Artificial Intelligence</option>
                <option value=\"foss\">Free and Open Source Software</option>
                <optgroup label=\"Elective\">
                    <option values=\"ooad\">Object Oriented Analysis and Design</option>
                    <option values=\"es\">Embedded Systems</option>
                    <option values=\"cc\">Cloud Computing</option>
                </optgroup>
                ";
            }
            elseif ($sem=='6'){
                echo "
                <option value=\"\" selected disabled hidden>Select subject</option>
                <option value=\"da\">Data Analytics</option>
                <option value=\"iot\">Internet of Things (IoT)</option>
                <option value=\"cs\">Cyber Security </option>
                <optgroup label=\"Elective\">
                    <option values=\"ml\">Machine Learning</option>
                    <option values=\"bct\">Block chain Technology</option>
                    <option values=\"dm\">Digital Marketing</option>
                </optgroup>
                ";
            }
        }

        #electronics

        elseif ($course=='ele') {
            if ($sem=='1') {
                echo "
                    <option value=\"\" selected disabled hidden>Select subject</option>
                    <option value=\"eng\">English I Listening and Speaking Skills</option>
                    <option value=\"evs\">Environmental Studies</option>
                    <option value=\"be\">Basic Electrical and Electronics Engg.</option>
                    <option value=\"de\">Digital Electronics</option>
                ";
            }
            elseif($sem=='2'){
                echo "
                    <option value=\"\" selected disabled hidden>Select subject</option>
                    <option value=\"eng\">English II Writing and Presentation Skills</option>
                    <option value=\"sse\">Solid State Electronics</option>
                    <option value=\"na\">Network Analysis</option>
                    <option value=\"c\">Programming in C</option>
                ";
            }
            elseif($sem=='3'){
                echo "
                    <option value=\"\" selected disabled hidden>Select subject</option>
                    <option value=\"ec\">Electronic Circuits</option>
                    <option value=\"ce\">Communication Engineering</option>
                    <option value=\"mi\">Microprocessor and Interfacing</option>
                    <option value=\"co\">Computer Organization</option>
                ";
            }
            elseif($sem=='4'){
                echo "
                    <option value=\"\" selected disabled hidden>Select subject</option>
                    <option value=\"aet\">Applied Electro-magnetic Theory</option>
                    <option value=\"lic\">Linear Integrated Circuits</option>
                    <option value=\"ei\">Electronic Instrumentation</option>
                    <option value=\"ma\">Microcontrollers and applications</option>
                    <optgroup label=\"Elective\">
                        <option values=\"pmc\">Principles of Mobile Communication</option>
                        <option values=\"pm\">Principles of Management</option>
                    </optgroup>
                ";
            }
            elseif($sem=='5'){
                echo "
                    <option value=\"\" selected disabled hidden>Select subject</option>
                    <option value=\"dsp\">Digital Signal Processing</option>
                    <option value=\"dc\">Digital Communication </option>
                    <option value=\"cn\">Computer Networks</option>
                ";
            }
            elseif($sem=='6'){
                echo "
                    <option value=\"\" selected disabled hidden>Select subject</option>
                    <option value=\"oc\">Optical Communication</option>
                    <option value=\"be\">Biomedical Engineering</option>
                    <option value=\"nano\">Nanoelectronics</option>
                    <optgroup label=\"Elective\">
                        <option values=\"iot\">Internet of Things and applications</option>
                        <option values=\"me\">Microwave Engineering</option>
                    </optgroup>
                ";
            }
        }

        #maths

        elseif ($course=='math') {
            if ($sem=='1') {
                echo "
                    <option values=\"\" selected disabled hidden>Select subject</option>
                    <option values=\"mm\">Methods of Mathematics</option>
                ";
            }
            elseif($sem=='2'){
                echo "
                    <option values=\"\" selected disabled hidden>Select subject</option>
                    <option values=\"fm\">Foundations of Mathematics</option>
                ";
            }
            elseif($sem=='3'){
                echo "
                    <option values=\"\" selected disabled hidden>Select subject</option>
                    <option values=\"emt\">Elementary Number Theory and Calculus - I</option>
                ";
            }
            elseif($sem=='4'){
                echo "
                    <option values=\"\" selected disabled hidden>Select subject</option>
                    <option values=\"emt\">Elementary Number Theory and Calculus - II</option>
                ";
            }
            elseif($sem=='5'){
                echo "
                    <option values=\"\" selected disabled hidden>Select subject</option>
                    <option values=\"ra\">Real Analysis - I</option>
                    <option values=\"ca\">Complex Analysis - I</option>
                    <option values=\"aa\">Abstract Algebra - Group Theory</option>
                    <option values=\"de\">Differential Equations</option>
                    <option values=\"ms\">Mathematics Software</option>
                ";
            }
            elseif($sem=='6'){
                echo "
                    <option values=\"\" selected disabled hidden>Select subject</option>
                    <option values=\"ra\">Real Analysis - II</option>
                    <option values=\"ca\">Complex Analysis - II</option>
                    <option values=\"aa\">Abstract Algebra - Ring Theory</option>
                    <option values=\"la\">Linear Algebra</option>
                    <option values=\"it\">Integral Transforms</option>
                    <optgroup label=\"Elective\">
                        <option value=\"gt\">Graph Theory</option>
                        <option value=\"lp\">Linear Programming with SageMath</option>
                        <option value=\"na\">Numerical Analysis with SageMath</option>
                        <option value=\"fm\">Fuzzy Mathematics</option>
                    </optgroup>
                ";
            }
        }

        #imb

        elseif ($course=='imb') {
            if ($sem=='1') {
                echo "
                    <option value=\"\" selected disabled hidden>Select subject</option>
                    <option value=\"eng\">English-I</option>
                    <optgroup label=\"Additional Language-I\">
                        <option value=\"mal\">Malayalam</option>
                        <option value=\"hindi\">Hindi</option>
                    </optgroup>
                    <option value=\"fob\">Fundamentals of Biochemistry</option>
                    <option value=\"fom\">Fundamentals of Microbiology</option>
                    <option value=\"btac\">Basic theoretical and analytical chemistry</option>
                ";
            }
            elseif($sem=='2'){
                echo "
                    <option value=\"\" selected disabled hidden>Select subject</option>
                    <option value=\"eng\">English-II</option>
                    <optgroup label=\"Additional Language-I\">
                        <option value=\"mal\">Malayalam</option>
                        <option value=\"hindi\">Hindi</option>
                    </optgroup>
                    <option value=\"bio\">Biomolecules</option>
                    <option value=\"mtp\">Microbial Taxonomy and Physiology</option>
                    <option value=\"pc\">Physical chemistry</option>
                ";
            }
            elseif($sem=='3'){
                echo "
                    <option value=\"\" selected disabled hidden>Select subject</option>
                    <option value=\"eng\">English-III</option>
                    <option value=\"mib\">Methods in Biochemistry</option>
                    <option value=\"cb\">Cell Biology</option>
                    <option value=\"mgb\">Microbial genetics and biotechnology</option>
                    <option value=\"boc\">Bio-organic chemistry</option>
                ";
            }
            elseif($sem=='4'){
                echo "
                    <option value=\"\" selected disabled hidden>Select subject</option>
                    <option value=\"eng\">English-IV</option>
                    <option value=\"pab\">Physiological aspects of Biochemistry</option>
                    <option value=\"evm\">Environmental Microbiology</option>
                    <option value=\"fm\">Food Microbiology</option>
                    <option value=\"bc\">Bio-inorganic and Electro chemistry</option>
                ";
            }
            elseif($sem=='5'){
                echo "
                    <option value=\"\" selected disabled hidden>Select subject</option>
                    <option value=\"mb1\">Metabolism-I</option>
                    <option value=\"mb2\">Metabolism-II</option>
                    <option value=\"ft\">Fermentation Technology</option>
                ";
            }
            elseif($sem=='6'){
                echo "
                    <option value=\"\" selected disabled hidden>Select subject</option>
                    <option value=\"cb\">Clinical Biochemistry</option>
                    <option value=\"mb\">Molecular Biology</option>
                    <option value=\"mmb\">medical Microbiology</option>
                    <optgroup label=\"Elective\">
                        <option value=\"imm\">Immunology</option>
                    </optgroup>
                ";
            }
        }

        #bcom

        elseif ($course=='bcom') {
            if ($sem=='1') {
                echo "
                    <option value=\"\" selected disabled hidden>Select subject</option>
                    <option value=\"eng\">English I</option>
                    <option value=\"iot\">Introduction to IT</option>
                    <option value=\"mpb\">Methodology and Perspectives of Business Education</option>
                    <option value=\"evs\">Environmental studies</option>
                    <option value=\"mct\">MANAGEMENT CONCEPTS AND THOUGHT</option>
                    <option value=\"me\">MANAGERIAL ECONOMICS</option>
                ";
            }
            elseif($sem=='2'){
                echo "
                    <option value=\"\" selected disabled hidden>Select subject</option>
                    <option value=\"eng\">English II</option>
                    <option value=\"fm\">FINANCIAL MANAGEMENT</option>
                    <option value=\"icl\">INFORMATICS AND CYBER LAWS</option>
                    <option value=\"fa\">FINANCIAL ACCOUNTING</option>
                    <option value=\"brf\">BUSINESS REGULATORY FRAMEWORK</option>
                    <option value=\"bm\">BUSINESS MATHEMATICS</option>
                ";
            }
            elseif($sem=='3'){
                echo "
                    <option value=\"\" selected disabled hidden>Select subject</option>
                    <option value=\"pf\">PROJECT FINANCE</option>
                    <option value=\"ed\">ENTREPRENEURSHIP DEVELOPMENT</option>
                    <option value=\"afa\">ADVANCED FINANCIAL ACCOUNTING</option>
                    <option value=\"ca\">COMPANY ADMINISTRATION</option>
                    <option value=\"cap\">COMPUTER APPLICATION FOR PUBLICATIONS</option>
                    <option value=\"eb\">E-Business</option>
                ";
            }
            elseif($sem=='4'){
                echo "
                    <option value=\"\" selected disabled hidden>Select subject</option>
                    <option value=\"fsi\">FINANCIAL SERVICES IN INDIA</option>
                    <option value=\"ifm\">INDIAN FINANCIAL MARKET</option>
                    <option value=\"bai\">BANKING AND INSURANCE</option>
                    <option value=\"ca\">CORPORATE ACCOUNTING</option>
                    <option value=\"sfdm\">SOFTWARE FOR DATA MANAGEMENT</option>
                    <option value=\"bs\">BUSINESS STATISTICS</option>
                ";
            }
            elseif($sem=='5'){
                echo "
                    <option value=\"\" selected disabled hidden>Select subject</option>
                    <option value=\"fit\">FUNDAMENTALS OF INCOME TAX</option>
                    <option value=\"ca\">COST ACCOUNTING</option>
                    <option value=\"mm\">MARKETING MANAGEMENT</option>
                    <option value=\"wdp\">WEB DESIGNING AND PRODUCTION FOR BUSINESS</option>
                ";
            }
            elseif($sem=='6'){
                echo "
                    <option value=\"\" slected disaled hidden>Select subject</option>
                    <option value=\"aud\">AUDITING</option>
                    <option value=\"ac\">APPLIED COSTING</option>
                    <option value=\"mc\">MANAGEMENT ACCOUNTING</option>
                    <option value=\"ca\">COMPUTERISED ACCOUNTING</option>
                ";
            }
        }

        #english

        elseif ($course=='english') {
            if ($sem=='1') {
                echo "
                    <option values=\"\" selected hidden disabled>Select subject</option>
                    <option values=\"eng\">Language Course (English):Language Skills</option>
                    <optgroup label=\"Language Course 2\">
                        <option values=\"hindi\">Hindi</option>
                        <option values=\"mal\">Malayalam</option>
                    </optgroup>
                    <option values=\"ils1\">Introduction to Literary Studies I</option>
                    <option values=\"ils2\">Introduction to Literary Studies II</option>
                    <option values=\"fmc\">Fundamentals of Mass Communication</option>
                    <option values=\"bi\">Basics of Informatics</option>
                ";
            }
            elseif($sem=='2'){
                echo "
                    <option values=\"\" selected hidden disabled>Select subject</option>
                    <option values=\"eng\">Language Course (English):Writings on Contemporary Issues</option>
                    <optgroup label=\"Language Course 2\">
                        <option values=\"hindi\">Hindi</option>
                        <option values=\"mal\">Malayalam</option>
                    </optgroup>
                    <option values=\"evs\">Environmental Studies and Disaster Management</option>
                    <option values=\"plc\">Popular Literature and Culture</option>
                    <option values=\"ala\">Art and Literary Aesthetics</option>
                    <option values=\"pmp\">Print Media Practices-I</option>
                    <option values=\"mh\">Media History</option>
                ";
            }
            elseif($sem=='3'){
                echo "
                    <option values=\"\" selected hidden disabled>Select subject</option>
                    <option values=\"eng\">Language Course (English):English for Career</option>
                    <option values=\"bl\">British Literature</option>
                    <option values=\"eel\">Evolution of the English Language</option>
                    <option values=\"pmp\">Print Media Practices-II</option>
                    <option values=\"vm\">Visual Media:Television and Cinema</option>
                ";
            }
            elseif($sem=='4'){
                echo "
                    <option values=\"\" selected hidden disabled>Select subject</option>
                    <option values=\"eng\">Language Course (English):Readings in Literature</option>
                    <option values=\"wl\">World Literatures</option>
                    <option values=\"nr\">Narratives of Resistance</option>
                    <option values=\"trc\">Theories and Research Methods of Mass Communication</option>
                    <option values=\"pra\">Public Relations and Advertising</option>
                ";
            }
            elseif($sem=='5'){
                echo "
                    <option values=\"\" selected hidden disabled>Select subject</option>
                    <option values=\"ts\">Translation Studies</option>
                    <option values=\"ct\">Criticism and Theory</option>
                    <option values=\"rb\">Radio Broadcasting</option>
                    <option values=\"mle\">Media Laws and Ethics</option>
                    <option values=\"dm\">Digital Media - Basic Theories and Practice</option>
                ";
            }
            elseif($sem=='6'){
                echo "
                    <option values=\"\" selected hidden disabled>Select subject</option>
                    <option values=\"em\">English for the Media</option>
                    <option values=\"lse\">Linguistics and Structure of English Language</option>
                    <option values=\"cw\">Creative Writing</option>
                    <option values=\"ms\">Media and Society</option>
                ";
            }
        }
    }

?>