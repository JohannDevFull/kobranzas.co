<template>
  <app-layout>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <h2>Usuarios</h2>
          <!-- <pre>{{users}}</pre> --> 
          <ul v-for="(user, id) of users" :key="id">
            <li>
              {{ user.name }} - {{ user.email }}
              <jet-nav-link
                :href="route('user.show', user.id)"
                :active="route().current('user.show')"
              >
                <button class="btn btn-sm btn-info">Ver&nbsp;<i class="nav-icon fas fa-eye "></i></button>
              </jet-nav-link> 
            </li>
          </ul>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import JetNavLink from "@/Jetstream/NavLink";

export default {
  props: ["users"],
  components: {
    AppLayout,
    JetNavLink,
  },
};
</script>