<template>
  <div class="loaderStyle">
    <div>
      <div class="lds-dual-ring"></div>
      <p>Espera por favor...</p>
    </div>
  </div>
</template>
<style lang="css">
.loaderStyle{
      text-align: center;
    margin-top: 30%;
}
.lds-dual-ring {
  display: inline-block;
  width: 80px;
  height: 80px;
}
.lds-dual-ring:after {
  content: " ";
  display: block;
  width: 64px;
  height: 64px;
  margin: 8px;
  border-radius: 50%;
  border: 6px solid #5af90be0;
  border-color: #5af90be0 transparent #5af90be0 transparent;
  animation: lds-dual-ring 1.2s linear infinite;
}
@keyframes lds-dual-ring {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
</style>