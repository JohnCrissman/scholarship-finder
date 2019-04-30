<footer class="content-fluid">
<div class="row justify-content-around">
<div> Copyrights 2019
</div>
<div> Designed and developed by The Crissmans
</div>
</div>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>

function populate_modal($id){
                    let elemento=document.getElementById($id);                    console.log(elemento);
                    let old_info = {
                        id: $id.substring(4),
                        title : elemento.querySelector('div div h5').innerText,
                        minRequirements: elemento.querySelectorAll('div div p span')[0].innerText,
                        gpa: parseFloat(elemento.querySelectorAll('div div p span')[1].innerText),
                        award: parseInt(elemento.querySelectorAll('div div p span')[2].innerText),
                        deadline: elemento.querySelectorAll('div div p span')[3].innerText,
                        applyUrl: elemento.querySelector('div div p a').innerText
                    }
                    console.log(old_info);
                    var modal = `<div class="modal-dialog" align="left">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Scholarship</h4>
                            </div>
                            <div class="modal-body">
                                <p>You can only modify these parameters:</p>
                                <form action="" method="POST" >
                                    <div class="form-group">
                                        <input name="id" type="number" value="${old_info['id']}" hidden readonly>
                                        <label >Scholarship Title</label>
                                        <input name="title" type="text" class="form-control"  value="${old_info['title']}">
                                        <label >Deadline</label>
                                        <input name="deadline" type="date" class="form-control" value="${old_info['deadline']}">
                                        <label >Minimum Requirements</label>
                                        <textArea class="form-control" value=""> ${old_info['minRequirements']} </textArea>
                                        <label >Award</label>
                                        <input name="award" type="number" class="form-control" value="${old_info['award']}">
                                        <label >Minimum GPA</label>
                                        <input name="gpa" type="number" step="0.1" class="form-control" value="${old_info['gpa']}">
                                    </div>
                                    <p class="small">All information correct?</p>
                                    <input type="submit" name="sch-upd-submit" class="btn btn-primary" value="Save">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>`;
                    document.querySelector('#editScholarship').innerHTML = modal;
                }

            function populate_modal_Sp($id){
                let elemento=document.getElementById($id);                    console.log(elemento);
                    let old_info = {
                        id: $id.substring(3),
                        name: elemento.querySelector('div div h5').innerText ,
                        agent: elemento.querySelector('div div h6 span').innerText,
                        phone: elemento.querySelectorAll('div div p span')[0].innerText,
                        email: elemento.querySelectorAll('div div p span')[1].innerText,
                        sponsorUrl: elemento.querySelectorAll('div div p span')[2].innerText
                    }
                    console.log(old_info);
                    var modal = `<div class="modal-dialog" align="left">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Sponsor</h4>
                            </div>
                            <div class="modal-body">
                                <p>You can only modify these parameters:</p>
                                <form action="" method="POST" >
                                    <div class="form-group">
                                        <input name="id" type="number" value="${old_info['id']}" hidden readonly>
                                        <label >Sponsor name</label>
                                        <input name="name" type="text" class="form-control"  value="${old_info['name']}">
                                        <label >Agent full name</label>
                                        <input name="agent" type="text" class="form-control" value="${old_info['agent']}">
                                        <label >Phone</label>
                                        <input name="phone" type="text" class="form-control" value="${old_info['phone']}">
                                        <label >Email</label>
                                        <input name="email" type="text" class="form-control" value="${old_info['email']}">
                                        <label >Sponsor URL</label>
                                        <input name="sponsorUrl" type="text" class="form-control" value="${old_info['sponsorUrl']}">
                                    </div>
                                    <p class="small">All information correct?</p>
                                    <input type="submit" name="sp-upd-submit" class="btn btn-primary" value="Save">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>`;
                    document.querySelector('#editSponsor').innerHTML = modal;
            }

            function populate_modal_C($id){
                let elemento=document.getElementById($id);                    console.log(elemento);
                    let old_info = {
                        id: $id.substring(4),
                        first : elemento.querySelectorAll('div div p span')[0].innerText,
                        last: elemento.querySelectorAll('div div p span')[1].innerText,
                        email: elemento.querySelectorAll('div div p span')[2].innerText
                    }
                    console.log(old_info);
                    var modal = `<div class="modal-dialog" align="left">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Coordinator</h4>
                            </div>
                            <div class="modal-body">
                                <p>You can only modify these parameters:</p>
                                <form action="" method="POST" >
                                    <div class="form-group">
                                        <input name="id" type="number" value="${old_info['id']}" hidden readonly>
                                        <label >First Name</label>
                                        <input name="firstName" type="text" class="form-control" value="${old_info['first']}">
                                        <label >Phone</label>
                                        <input name="lastName" type="text" class="form-control" value="${old_info['last']}">
                                        <label >Email</label>
                                        <input name="email" type="text" class="form-control" value="${old_info['email']}">
                                    </div>
                                    <p class="small">All information correct?</p>
                                    <input type="submit" name="coo-upd-submit" class="btn btn-success" value="Save">
                                    <input type="submit" name="coo-add-submit" class="btn btn-primary" value="Save as new">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>`;
                    document.querySelector('#editCoordinator').innerHTML = modal;
            }
        
</script>