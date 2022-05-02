<template>
  <div>
    <div class="min-h-screen bg-gray-100">
      <nav class="bg-white border-b border-gray-100">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="flex justify-between h-16">
            <div class="flex">
              <!-- Logo -->
              <div class="shrink-0 flex items-center flex-col">
                <Link :href="route('posts.index')">
                  <BreezeApplicationLogo class="block h-9 w-auto" />
                </Link>
                <small class="text-gray-400">Driver: {{ postsDriver }}</small>
              </div>

              <!-- Navigation Links -->
              <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <BreezeNavLink
                  :href="route('posts.index')"
                  :active="route().current('posts.index')"
                >
                  Posts
                </BreezeNavLink>
              </div>
              <div class="hidden sm:ml-20 sm:flex py-2">
                <BreezeInput
                  id="search"
                  type="text"
                  class="mt-1 block w-full"
                  v-model="search"
                  @submit.prevent="redirectToSearch"
                  @keypress.enter="redirectToSearch"
                  placeholder="Search"
                  autofocus
                  autocomplete="search"
                />
              </div>
            </div>

            <div
              class="hidden sm:flex sm:items-center sm:ml-6"
              v-if="$page.props.auth.user"
            >
              <!-- Settings Dropdown -->
              <div class="ml-3 relative">
                <BreezeDropdown align="right" width="48">
                  <template #trigger>
                    <span class="inline-flex rounded-md">
                      <button
                        type="button"
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                      >
                        {{ $page.props.auth.user.name }}

                        <svg
                          class="ml-2 -mr-0.5 h-4 w-4"
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 20 20"
                          fill="currentColor"
                        >
                          <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"
                          />
                        </svg>
                      </button>
                    </span>
                  </template>

                  <template #content v-if="$page.props.auth.user">
                    <BreezeDropdownLink
                      :href="route('logout')"
                      method="post"
                      as="button"
                    >
                      Log Out
                    </BreezeDropdownLink>
                  </template>
                </BreezeDropdown>
              </div>
            </div>

            <div v-else class="hidden sm:flex sm:items-center sm:ml-6">
              <!-- Settings Dropdown -->
              <div class="ml-3 relative">
                <BreezeNavLink
                  :href="route('login')"
                  :active="route().current('login')"
                >
                  Log in
                </BreezeNavLink>
              </div>

              <div class="ml-3 relative">
                <BreezeNavLink
                  v-if="canRegister"
                  :href="route('register')"
                  :active="route().current('register')"
                >
                  Register
                </BreezeNavLink>
              </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
              <button
                @click="showingNavigationDropdown = !showingNavigationDropdown"
                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
              >
                <svg
                  class="h-6 w-6"
                  stroke="currentColor"
                  fill="none"
                  viewBox="0 0 24 24"
                >
                  <path
                    :class="{
                      hidden: showingNavigationDropdown,
                      'inline-flex': !showingNavigationDropdown,
                    }"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"
                  />
                  <path
                    :class="{
                      hidden: !showingNavigationDropdown,
                      'inline-flex': showingNavigationDropdown,
                    }"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M6 18L18 6M6 6l12 12"
                  />
                </svg>
              </button>
            </div>
          </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div
          :class="{
            block: showingNavigationDropdown,
            hidden: !showingNavigationDropdown,
          }"
          class="sm:hidden"
        >
          <div class="pt-2 pb-3 space-y-1">
            <BreezeResponsiveNavLink
              :href="route('posts.index')"
              :active="route().current('posts.index')"
            >
              Posts
            </BreezeResponsiveNavLink>
          </div>

          <!-- Responsive Settings Options -->
          <div
            class="pt-4 pb-1 border-t border-gray-200"
            v-if="$page.props.auth.user"
          >
            <div class="px-4">
              <div class="font-medium text-base text-gray-800">
                {{ $page.props.auth.user.name }}
              </div>
              <div class="font-medium text-sm text-gray-500">
                {{ $page.props.auth.user.email }}
              </div>
            </div>

            <div class="mt-3 space-y-1">
              <BreezeResponsiveNavLink
                :href="route('logout')"
                method="post"
                as="button"
              >
                Log Out
              </BreezeResponsiveNavLink>
            </div>
          </div>
          <div v-else>
            <Link
              :href="route('login')"
              class="text-sm text-gray-700 underline"
            >
              Log in
            </Link>

            <Link
              v-if="canRegister"
              :href="route('register')"
              class="ml-4 text-sm text-gray-700 underline"
            >
              Register
            </Link>
          </div>
        </div>
      </nav>

      <!-- Page Heading -->
      <header class="bg-white shadow" v-if="$slots.header">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
          <slot name="header" />
        </div>
      </header>

      <!-- Page Content -->
      <main class="px-5 mt-5 pb-5">
        <slot />
      </main>
    </div>
  </div>
</template>
<script>
import BreezeApplicationLogo from "@/Components/ApplicationLogo.vue";
import BreezeDropdown from "@/Components/Dropdown.vue";
import BreezeDropdownLink from "@/Components/DropdownLink.vue";
import BreezeNavLink from "@/Components/NavLink.vue";
import BreezeResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import { Link } from "@inertiajs/inertia-vue3";
import BreezeInput from "@/Components/Input.vue";
import { Inertia } from "@inertiajs/inertia";

export default {
  props: {
    canLogin: Boolean,
    canRegister: Boolean,
    postsDriver: String,
  },
  data() {
    return {
      search: "",
      showingNavigationDropdown: false,
    };
  },
  methods: {
    redirectToSearch() {
      if (!this.search || this.search === "") {
        return;
      }
      const searchInputTmp = this.search;
      this.search = "";
      Inertia.get("/posts/search-results/" + searchInputTmp);
    },
  },
  components: {
    BreezeApplicationLogo,
    BreezeDropdown,
    BreezeDropdownLink,
    BreezeNavLink,
    BreezeResponsiveNavLink,
    Link,
    BreezeInput,
  },
};
</script>
