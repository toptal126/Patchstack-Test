<template>
  <div>
    <h3>All Vulnerabilities</h3>
    <hr />

    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th class="w-25">Title</th>
          <th>Description</th>
          <th>Created At</th>
          <th>Updated At</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="vulnerability in vulnerabilities" :key="vulnerability.id">
          <td>{{ vulnerability.id }}</td>
          <td>
            <a :href="vulnerability.link" target="_blank">{{
              vulnerability.title
            }}</a>
          </td>
          <td>{{ vulnerability.description }}</td>
          <td>{{ vulnerability.created_date }}</td>
          <td>{{ vulnerability.updated_date }}</td>
          <td>
            <div class="btn-group" role="group">
              <router-link
                :to="{ name: 'edit', params: { id: vulnerability.id } }"
                class="btn btn-primary"
                >Edit
              </router-link>
              <button
                class="btn btn-danger"
                @click="deleteVulnerability(vulnerability.id)"
              >
                Delete
              </button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      vulnerabilities: [],
    };
  },
  created() {
    this.axios
      .get("http://localhost:8000/api/vulnerabilities")
      .then((response) => {
        this.vulnerabilities = response.data;
      });
  },
  methods: {
    deleteVulnerability(id) {
      this.axios
        .delete(`http://localhost:8000/api/vulnerability/delete/${id}`)
        .then((response) => {
          let i = this.vulnerabilities.map((item) => item.id).indexOf(id); // find index of your object
          this.vulnerabilities.splice(i, 1);
        });
    },
  },
};
</script>