import AllVulnerabilities from "./components/AllVulnerabilities.vue";
import AddVulnerability from "./components/AddVulnerability.vue";
import EditVulnerability from "./components/EditVulnerability.vue";

export const routes = [
    {
        name: "home",
        path: "/",
        component: AllVulnerabilities,
    },
    {
        name: "add",
        path: "/add",
        component: AddVulnerability,
    },
    {
        name: "edit",
        path: "/edit/:id",
        component: EditVulnerability,
    },
];
