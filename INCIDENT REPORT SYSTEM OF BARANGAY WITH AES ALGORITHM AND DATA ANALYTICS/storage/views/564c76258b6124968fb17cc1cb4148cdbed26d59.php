<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<!-- Sidebar-->
<div class="border-end" id="sidebar-wrapper">

    <div class="sidebar-heading border-bottom mt-3 mb-3">

        <a href="/"><img src="<?php echo e(asset('/img/385-logo-white.png')); ?>" width="150" height="150" alt="" class="img-fluid mx-auto d-block"></a>
    </div>



    <div class="list-group list-group-flush" data-spy="affix" data-offset-top="205">
        <a class="list-group-item list-group-item-action text-warning text-center" href="">
            <script>
                var today = new Date();
                var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
                var time = today.getHours() + ":" + today.getMinutes();
                document.write(today.toDateString() + ' | ' + time);
            </script>
        </a>


        <br>
        <span class="fw-bold p-2">ANALYTICS</span>
        <a class="list-group-item list-group-item-action p-3" href="<?php echo e(route('home')); ?>"><i class="bi bi-grid"></i> Dashboard</a>
        <br>


        <span class="fw-bold p-2">CONTENT</span>
        <a class="list-group-item list-group-item-action  p-3 dropdown-toggle" href="#blotterSubmenu" data-bs-toggle="collapse" aria-expanded="false"><i class="bi bi-pen"></i> Blotter</a>
        <ul class="collapse" id="blotterSubmenu">

            <!-- <?php if(Auth::user()->user_type_id == 1): ?>
            <li>
                <a href="<?php echo e(route('blotter.create')); ?>" :active="request()->routeIs('blotter.create')" class="subMenu">Create Blotter Report</a>
                <hr>
            </li>
            <?php endif; ?> -->
            <li class="mt-3">
                <?php

                use App\Models\Blotter;
                use App\Models\CaseHearing;
                use App\Models\Hearing;

                $case_hearing = array();
                $blotter = array();
                $hearings = array();

                $data = Blotter::latest()->get();
                $chs = CaseHearing::latest()->get()->unique('case_no');

                foreach ($data as $d) {
                    if (!$chs->contains('case_no', $d->case_no)) {
                        $blotter[] = Blotter::where('case_no', $d->case_no)->first();
                    }
                }
                foreach ($chs as $c) {
                    $hearings[] = Hearing::where('hearing_id', $c->hearing_id)->first();
                }

                foreach ($hearings as $h) {
                    if (!$h->settlement_id && !$h->award_id) {
                        $case_hearing[] = CaseHearing::where('hearing_id', $h->hearing_id)->first();
                    }
                }

                foreach ($case_hearing as $ch) {
                    $blotter[] = Blotter::where('case_no', $ch->case_no)->latest()->first();
                }
                $ongoingCount = count($blotter);
                ?>
                <a href="<?php echo e(route('blotter.show')); ?>" class="subMenu position-relative p-2">Display Ongoing Cases
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <?php echo e($ongoingCount); ?>

                        <span class="visually-hidden">unread messages</span>
                    </span>
                </a>
                <hr>
            </li>

            <li>
                <?php

                use App\Models\Amicable_Settlement;
                use App\Models\Arbitration_Award;
                use Illuminate\Support\Facades\DB;

                $all_case_hearing = DB::select('SELECT * FROM case_hearings WHERE id IN (SELECT MAX(id) FROM case_hearings GROUP BY case_no)');
                $data2 = array();
                $hearings2 = array();

                foreach ($all_case_hearing as $ch) {
                    $hearings2[] = Hearing::where('hearing_id', $ch->hearing_id)->first();
                }

                foreach ($all_case_hearing as $key => $value) {
                    $blotter = Blotter::where('case_no', $value->case_no)->first();
                    if ($hearings2[$key]->settlement_id) {
                        $amicable_settlement = Amicable_Settlement::where('settlement_id', $hearings2[$key]->settlement_id)->first();

                        $date_of_exe = strtotime($amicable_settlement->date_agreed . ' + 10 days');

                        if ($date_of_exe > strtotime("now") && is_null($blotter->date_of_execution)) {
                            $data2[] = $amicable_settlement->date_agreed;
                        }
                    } else if ($hearings2[$key]->award_id) {
                        $arbitration_awards = Arbitration_Award::where('award_id', $hearings2[$key]->award_id)->first();

                        $date_of_exe = strtotime($arbitration_awards->date_agreed . ' + 10 days');

                        if ($date_of_exe > strtotime("now") && is_null($blotter->date_of_execution)) {
                            $data2[] = $arbitration_awards->date_agreed;
                        }
                    }
                }

                $settledCount = count($data2);
                ?>
                <a href="<?php echo e(route('blotter.settled')); ?>" class="subMenu p-2 position-relative">Settled Cases
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">

                        <?php echo e($settledCount); ?>

                        <span class="visually-hidden">unread messages</span>
                    </span>
                </a>
                <hr>
            </li>

            <li>
                <a href="<?php echo e(route('blotter.court-actions')); ?>" class="subMenu p-2">Court Actions</a>
                <hr>
            </li>
        </ul>


        <a class="list-group-item list-group-item-action  p-3 dropdown-toggle" href="#noticesSubMenu" data-bs-toggle="collapse" aria-expanded="false"><i class="bi bi-bell"></i> Notices</a>
        <ul class="collapse" id="noticesSubMenu">
            <?php if(Auth::user()->user_type_id == 1): ?>
            <li>
                <a href="<?php echo e(route('notice.show')); ?>" :active="request()->routeIs('<?php echo e(route('notice.show')); ?>')" class="subMenu">Show Notices (Incomplete)</a>
                <hr>
            </li>
            <?php endif; ?>
            <li>
                <a href="<?php echo e(route('notice.summary')); ?>" class="subMenu">List of All Cases' Notices</a>
                <hr>
            </li>
        </ul>


        <?php if(Auth::user()->user_type_id == 1 || Auth::user()->user_type_id == 2): ?>
        <a class="list-group-item list-group-item-action  p-3 dropdown-toggle" href="#hearingSubmenu" data-bs-toggle="collapse" aria-expanded="false"><i class="bi bi-alarm"></i> Hearing Process</a>
        <ul class="collapse" id="hearingSubmenu">
            <li>
                <a href="<?php echo e(route('settlement.show.mediation')); ?>" :active="request()->routeIs('<?php echo e(route('settlement.show.mediation')); ?>')" class="subMenu">Mediation Hearings</a>
                <hr>
            </li>
            <li>
                <a href="<?php echo e(route('settlement.show.conciliation')); ?>" :active="request()->routeIs('<?php echo e(route('settlement.show.conciliation')); ?>')" class="subMenu">Conciliation Hearings</a>
                <hr>
            </li>
            <li>
                <a href="<?php echo e(route('settlement.show.arbitration')); ?>" :active="request()->routeIs('<?php echo e(route('settlement.show.arbitration')); ?>')" class="subMenu">Arbitration Hearings</a>
                <hr>
            </li>
        </ul>
        <?php endif; ?>


        <a class="list-group-item list-group-item-action  p-3 dropdown-toggle" href="#incidentSubMenu" data-bs-toggle="collapse" aria-expanded="false"><i class="bi bi-inboxes"></i> Incident Report</a>
        <ul class="collapse" id="incidentSubMenu">
            <li>
                <a href="<?php echo e(route('user.show')); ?>" class="subMenu">Display Incident Reports</a>
                <hr>
            </li>
        </ul>

        <br>
        <span class="fw-bold p-2">MANAGEMENT</span>

        <?php if(Auth::user()->user_type_id == 1): ?>
        <a class="list-group-item list-group-item-action  p-3 dropdown-toggle" href="#accountSubmenu" data-bs-toggle="collapse" aria-expanded="false"><i class="bi bi-person"></i> Accounts</a>
        <ul class="collapse" id="accountSubmenu">
            <li>
                <a href="<?php echo e(route('account.register')); ?>" :active="request()->routeIs('<?php echo e(route('account.register')); ?>')" class="subMenu">Register New Account</a>
                <hr>
            </li>
            <li>
                <a href="<?php echo e(route('account.show')); ?>" class="subMenu">Manage Accounts</a>
                <hr>
            </li>
        </ul>
        <?php endif; ?>

        <a class="list-group-item list-group-item-action  p-3 " href="<?php echo e(route('blotter.kp_case')); ?>"><i class="bi bi-list-check"></i> KP Cases</a>
        <a class="list-group-item list-group-item-action  p-3 " href="<?php echo e(route('feedbacks.show')); ?>"><i class="bi bi-signpost"></i> Feedbacks & Queries</a>
        <a class="list-group-item list-group-item-action  p-3 " href="<?php echo e(route('activity_logs.show')); ?>"><i class="bi bi-flag"></i> Activity Logs</a>
        <a class="list-group-item list-group-item-action  p-3 " href="<?php echo e(route('user_manual.show')); ?>"><i class="bi bi-question-square"></i> User Manual</a>

    </div>
</div>


<script>
    window.addEventListener('DOMContentLoaded', event => {

        // Toggle the side navigation
        const sidebarToggle = document.body.querySelector('#sidebarToggle');
        if (sidebarToggle) {
            // Uncomment Below to persist sidebar toggle between refreshes
            // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
            //     document.body.classList.toggle('sb-sidenav-toggled');
            // }
            sidebarToggle.addEventListener('click', event => {
                event.preventDefault();
                document.body.classList.toggle('sb-sidenav-toggled');
                localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
            });
        }

    });
</script><?php /**PATH C:\Users\eplum\Desktop\Thesis\BARRIO FILE\barrio\resources\views/admin/sidebar.blade.php ENDPATH**/ ?>