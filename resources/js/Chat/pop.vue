<template>
  <div>
    <audio id="myAudio">
      <source src="/storage/img/pop.ogg" type="audio/ogg" />
      <source src="/storage/img/pop.mp3" type="audio/mpeg" />
      Your browser does not support the audio element.
    </audio>
  </div>
</template>
<script>
export default {
    mounted(){
        console.log('popo conectado');
    }
}
</script>