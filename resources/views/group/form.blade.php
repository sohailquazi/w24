@csrf
<div class="form-group">
    <label>Group Name</label>
    <input type="text" name="name" class="form-control" required="" value="@isset($group){{$group->name}}@endisset">
</div>
<div class="form-group">
    <button class="btn btn-primary">Save</button>
</div>