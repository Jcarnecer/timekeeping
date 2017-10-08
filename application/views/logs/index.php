<script>
$(function(){
    $("#myTable").DataTable();
})

</script>

<h3>Logs</h3>
        <br><hr>
        <div class="table-responsive">
            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th>Action</th>
                        <th>Description</th>
                        <th>User</th>
                        <th>Position</th>
                        <th>Date / Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($logs as $row): ?>
                        <tr>
                            <td><?=$row->action ?></td>
                            <td><?=$row->description ?></td>
                            <td><?=$row->user ?></td>
                            <td><?=$row->position ?></td>
                            <td><?= date('F j, Y g:i a',strtotime($row->date)) ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
