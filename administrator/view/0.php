
                       <div class="row">
                            <div class="col-xs-12">
                                <h3 class="header smaller lighter blue">管理员列表</h3>
                                <div class="table-header">
                                    管理员列表
                                </div>

                                <div class="table-responsive">
                                    <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                                         <thead>
                                        <tr>
                                            <th class="center">
                                                <label>
                                                    <input type="checkbox" class="ace" />
                                                    <span class="lbl"></span>
                                                </label>
                                            </th>
                                            <th class="center">管理员编号</th>
                                            <th class="center">姓名</th>
                                            <th class="hidden-480 center">性别</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                       <?php
                                        require_once '../model/PdoMySQL.class.php';
                                        require_once '../model/config.php';
                                        require_once '../controller/utils/showHelper.php';
                                        $helper = ShowHelper::getInstance();
                                        $pdoMysql = new PdoMySQL();
                                        $allrows = $pdoMysql->find("administrator");
                                        foreach($allrows as $row){
                                            echo '<tr>';
                                            echo '<td class="center">';
                                            echo '<label>';
                                            echo '<input type="checkbox" class="ace" />';
                                            echo '<span class="lbl"></span>';
                                            echo '</label>';
                                            echo '</td>';

                                            echo '<td class="center" id="idadministrator">'.$row['idadministrator'].'</td>';
                                            echo '<td class="hidden-480 center">'.$row['name'].'</td>';
                                            echo '<td class="center" id="idbook">'.$row['sex'].'</td>';
                                            echo '<td class="center">';
                                            echo '<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">';
                                            echo '</div>';
                                            echo '<div class="visible-xs visible-sm hidden-md hidden-lg ">';
                                            echo '<div class="inline position-relative center">';
                                            echo '<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">';
                                            echo '<i class="icon-cog icon-only bigger-110"></i>';
                                            echo '</button>';
                                            echo '<ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">';
                                            echo '<li>';
                                            echo '<a  class="btn btn-xs btn-info"  role="button" href=""><i class="icon-remove bigger-120">删</i></a>';

                                            echo '</li>';
                                            echo '<li>';
                                            echo '<a  class="btn btn-xs btn-info"  role="button" href="" ><i class="icon-edit bigger-120">编</i></a>';

                                            echo '</li>';
                                            echo '</ul>';
                                            echo '</div>';
                                            echo '</div>';
                                            echo '</td>';
                                            echo '</tr>';
                                        }


                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="modal-table" class="modal fade" tabindex="-1">