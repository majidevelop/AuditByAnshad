<style>
    .cards{
        border: 1px solid;
        margin-bottom: 1rem;
        padding: 1rem;
        border-radius: 1rem;
    }

    .cards {
  padding: 16px;
  border: 1px solid #ddd;
  border-radius: 12px;
  transition: all 0.3s ease;
  background-color: #fff;
}

    .cards:hover {
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
  transform: scale(1.02);
  cursor: pointer;
}
</style>

<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">View Audit Compliance Reports</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Audit</a></li>
                                            <li class="breadcrumb-item active">View Audit Compliance Reports</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                               
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Audit Compliance Reports</h4>
                                        <!-- <p class="card-title-desc">This is an experimental awesome solution for responsive tables with complex data.</p> -->
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Audit Title</th>
                                                        <th>Department</th>
                                                        <th>Department POC</th>
                                                        <th>Audit Lead</th>
                                                        <th>#Display Number </th>
                                                        <th>No. of observations</th>
                                                        <th>Status</th>

                                                        <th>
                                                            Action
                                                        </th>

                                                    </tr>
                                                </thead>
                                                <tbody class="" id="non_compliance_table">
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="assets/js/common/admin.js"></script>
                <script src="assets/js/audit/audit.js"></script>
                <script src="assets/js/audit/audit_compliance_reports.js"></script>

<script>
    let non_conformities;
    let audit_plans;
    let scheduled_audits;
    let application_users;
    let departments;
    async function load_func(){
        await fetchNonConformities();
        await get_departments();
        await get_application_users();

        await get_audit_plans();

        await get_inspections();
        await renderComplianceReports();
    }
</script>