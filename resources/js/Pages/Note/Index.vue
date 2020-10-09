<template>
  <div>
    <h1 class="text-3xl">{{ user.name }}</h1>
    <ul>
      <li v-for="note in notes.data" :key="note.id">
        <inertia-link href="/count?id=1000001">Click me</inertia-link> {{ note.id }} - {{ note.body }} [{{ note.count }}]
      </li>
    </ul>
    <div>
      Page: {{ notes.current_page }}/{{ notes.last_page }}
      |
      Total: {{ notes.total }}
      |
      <span v-for="link in notes.links" :key="link.url">
        <inertia-link :href=link.url>{{ link.label }}</inertia-link> |
      </span>
    </div>
  </div>
</template>

<script>

export default {
  props: {
    user: Object,
    notes: Object,
  },
}

</script>
