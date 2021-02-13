<template>
  <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{info.info[0]}}</h3>

          <p>{{infoName.infoName[0]}}</p>
        </div>
        <div class="icon">
          <i class="nav-icon fas fa-hands-helping"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{info.info[1]}}</h3>

          <p>{{infoName.infoName[1]}}</p>
        </div>
        <div class="icon">
          <i class="fas fa-building"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{info.info[2]}}</h3>

          <p>{{infoName.infoName[2]}}</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{info.info[3]}}</h3>

          <p>{{infoName.infoName[3]}}</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
      </div>
      <div></div>
    </div>
    <!-- ./col -->
  </div>
</template>
<script>
export default {
  props: ["infoName", "info"],

};
</script>