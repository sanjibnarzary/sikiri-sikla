<div class="container">
    <hr>
    <div class="footer-a">
        <div class="row">
            <div class="col-md-4">
                <h3 class="footer-heading">Address</h3>
                <address class="margin-bottom-30px">
                    <ul class="list-unstyled">
                        <li>Central Institute of Technology Kokrajhar
                            <br> PO: Rangalikhata, Dist: Kokrajhar</li>
                        <li>BTAD, Assam, India - 783370</li>
                        <li>Email: registrar@cit.ac.in</li>
                        <li>Phone: 91-3661- 277279</li>
                    </ul>
                </address>
                <!-- END COLUMN 1 -->
            </div>
            <div class="col-md-4">
                <!-- COLUMN 2 -->
                <h3 class="footer-heading">Useful Links</h3>
                <div class="row margin-bottom-30px">
                    <div class="col-xs-6">
                        <ul class="list-unstyled footer-nav">
                            <li><a href="/about-us">About Us</a></li>
                            <li><a href="/contact-us">Contact Us</a></li>
                            <li><a href="/director">Director</a></li>
                            <li><a href="/registrar">Registrar</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-6">
                        <ul class="list-unstyled footer-nav">
                            <ul class="list-unstyled footer-nav">
                                <li><a href="/notices/type/tender">Tenders</a></li>
                                <li><a href="/notices/type/notice">Notices</a></li>
                                <li><a href="http://centrallibrary.cit.ac.in">Central Library</a></li>
                                <li><a href="http://admission.cit.ac.in">Admission</a></li>
                            </ul>
                        </ul>

                    </div>
                </div>
                <!-- END COLUMN 2 -->
            </div>
            <div class="col-md-4">
                <h3 class="footer-heading">Departments</h3>
                <!-- COLUMN 3 -->
                <ul class="list-unstyled">
                    <?php
                    $str = "SELECT * FROM `departments` WHERE `type`='core' ORDER BY `title` ASC";
                    $depts = $f->selectQueries($str);
                    foreach ($depts as $dept){
                        echo '<li><a href="/department/'.$dept['code'].'">'.$dept['title'].'</a></li>';
                    }
                    ?>
                </ul>
                <!-- END COLUMN 3 -->
            </div>
        </div>
    </div>
</div>
<div class="center-block text-center" id="footer">
    Visitor - <?php

    require_once ('visitor-counter.php');


    ?>
    <br>
    Copyright &copy; 19 April, 2017 - <?php echo date('d F, Y');?> Central Institute of Technology Kokrajhar<br>
    <div class="description" style="font-size: 12px;">Developed & maintained by Department of Computer Science & Engineering, Central Institute of Technology Kokrajhar</div>
</div>