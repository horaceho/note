<template>
  <div>
    <h1 class="text-3xl">{{ user.name }}</h1>
    <ul>
      <li v-for="note in notes.data" :key="note.id">
        {{ note.id }}
        <inertia-link :href="'/count/?id=' + note.id + '&page=' + notes.current_page" > [+] </inertia-link>
        <inertia-link href="/comment" method="post" :data="{ id: note.id }" > [...] </inertia-link>
        {{ note.body }}
        [{{ note.count }}]
        <p v-for="comment in note.comments" :key="comment.id" class="ml-8 italic">
          {{ comment.body }}
        </p>
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
