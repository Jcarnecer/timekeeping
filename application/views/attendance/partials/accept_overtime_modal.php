<!-- Modal -->
<div class="modal fade" id="accept-overtime-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <h5 id="a-ot-q"></h5><br>
        <table class="table table-borderless table-responsive">
          <thead> </thead>
            <tbody>

              <tr>
                <td>
                  <b><label class="group-label">Name:</label></b>
                </td>
                <td>
                  <div class="group-data" id="ot-name"></div>
                </td>
              </tr>

              <tr>
                <td>
                  <b><label class="group-label">Overtime Date:</label></b>
                </td>
                <td>
                  <div class="group-data" id="ot-date"></div>
                </td>
              </tr>

              <tr>
                <td>
                  <b><label class="group-label">Start:</label></b>
                </td>
                <td>
                  <div class="group-data" id="ot-start"></div>
                </td>
              </tr>

              <tr>
                <td>
                  <b><label class="group-label">End:</label></b>
                </td>
                <td>
                  <div class="group-data" id="ot-end"></div>
                </td>
              </tr>

              <tr>
                <td>
                  <b><label class="group-label">Reason:</label></b>
                </td>
                <td>
                  <div class="group-data" id="ot-reason"></div>
                </td>
              </tr>
            </tbody>
          </table>

        <form id="accept-overtime-form" method="post">
        <input type="hidden" id="ot-id" name="id">
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <button type="submit" class="btn custom-button">Yes</button>
        </form>
      </div>

    </div>
  </div>
</div>
