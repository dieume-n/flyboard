<template>
  <modal name="new-project" classes="bg-white rounded-lg shadow-md p-8" height="auto">
    <h2 class="text-center text-2xl py-3 font-normal">Let's start something new</h2>
    <form v-on:submit.prevent="submit">
      <div class="flex mt-4">
        <div class="flex-1 mr-4">
          <div class="mb-4">
            <label for="title" class="text-sm">Title</label>
            <input
              type="text"
              name="title"
              id="title"
              class="form-input mt-1 block w-full text-sm"
              :class="{ 'border-red-500' : errors.title }"
              placeholder="Project title"
              v-model="form.title"
            />
            <span
              class="text-red-500 text-xs"
              v-for="(error, index) in errors.title"
              :key="index"
            >{{ error }}</span>
          </div>
          <div>
            <label for="description" class="text-sm">Description</label>
            <textarea
              class="form-textarea mt-1 block w-full text-sm"
              :class="{ 'border-red-500' : errors.description }"
              name="description"
              id="description"
              rows="7"
              placeholder="Project description"
              v-model="form.description"
            ></textarea>
            <span
              class="text-red-500 text-xs"
              v-for="(error, index) in errors.description"
              :key="index"
            >{{ error }}</span>
          </div>
        </div>
        <div class="flex-1 ml-4">
          <div class="mb-4">
            <label class="text-sm mb-1">Let's add some tasks</label>
            <input
              type="text"
              name="title"
              class="form-input mb-2 block w-full text-sm"
              placeholder="Task 1"
              v-for="(task, index) in form.tasks"
              :key="index"
              v-model="task.value"
            />
          </div>
          <button
            type="button"
            class="inline-flex items-center outline-none focus:outline-none"
            v-on:click.prevent="addTask"
          >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
              <path
                d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6 13h-5v5h-2v-5h-5v-2h5v-5h2v5h5v2z"
              />
            </svg>
            <span class="ml-2 text-sm">Add Task</span>
          </button>
        </div>
      </div>

      <div class="mt-8 flex justify-end">
        <button
          type="button"
          class="btn btn-red mr-2"
          v-on:click.prevent="$modal.hide('new-project')"
        >Cancel</button>
        <button class="btn btn-indigo" v-on:click.prevent="submit">Create Project</button>
      </div>
    </form>
  </modal>
</template>

<script>
export default {
  data() {
    return {
      form: {
        title: "",
        description: "",
        tasks: [{ value: "" }],
      },
      errors: {},
    };
  },
  methods: {
    addTask() {
      this.form.tasks.push({ value: "" });
    },
    submit() {
      axios
        .post("/projects", this.form)
        .then((response) => (location = response.data.message))
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
    },
  },
};
</script>
