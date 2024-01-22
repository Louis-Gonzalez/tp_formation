<script>
export default {
    name: "Seraphin",
    data(){
        return {bobo : 100}
    },
    props: {
        msg: {
            type: String,
            required:false,
            default: "Seraphin à mal à la tête et c'est "
        },
    },
    methods:{
        multiBobo(){
            this.bobo= this.bobo*100
        }
    }
}
</script>

<template>
    <button @click="multiBobo">Multi les bobos par 100 </button>
    <p>
        {{ msg }}{{ bobo }} bobos
        
    </p>
</template>