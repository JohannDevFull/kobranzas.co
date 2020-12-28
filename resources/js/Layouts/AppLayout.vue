<template>
<!-- WRAPPER -->
<div class="wrapper">
    
    <!-- NAV -->
    <menud/>

    <!-- ASIDE -->
    <asider/>
        
    <!-- CONTENT-WRAPPER -->
    <div class="content-wrapper">
        
        

        <!-- Main content -->
        <section class="content" style="padding-top:20px; ">
          
          <div class="container-fluid" style="">
                <!-- CONTENT-SECTION -->
                <main >
                    <!-- CONTENT-FLUID -->
                    <!-- Here: se cargan los contenidos spa XD -->
                    <slot></slot>
                </main>
            
          </div><!-- /.container-fluid -->
          
        </section>
        <!-- /.content -->
    </div>

    <!-- FOOTER -->
    <footig/>

    <!-- Modal Portal -->
    <portal-target name="modal" multiple>
    </portal-target>
    
    <ChatWidget  v-if="$inertia.page.rol == 'Cliente'"></ChatWidget>

</div>

</template>

<script>
    import Menud from '@/Shared/Menud'
    import Asider from '@/Shared/Asider' 
    import Footig from '@/Shared/Footer'
        import ChatWidget from '@/Chat/ChatWidget'  

    export default {
        components: {
            Menud,
            Asider, 
            Footig,  
            ChatWidget
        },

        data() {
            return {
                showingNavigationDropdown: false,
            }
        },

        methods: {
            switchToTeam(team) {
                this.$inertia.put(route('current-team.update'), {
                    'team_id': team.id
                }, {
                    preserveState: false
                })
            },

            logout() {
                axios.post(route('logout').url()).then(response => {
                    window.location = '/';
                })
            },
        }
    }
</script>
