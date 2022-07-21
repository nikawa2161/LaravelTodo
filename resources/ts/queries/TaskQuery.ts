import * as api from "../api/TaskAPI";
import { useQuery, useMutation, useQueryClient } from "react-query";

const useTasks = () => {
    return useQuery("tasks", async () => api.getTasks());
};


const useUpdateDoneTask = () => {
    const queryClient = useQueryClient()

    return useMutation(api.updateDoneTask, {
        onSuccess: () => {
            queryClient.invalidateQueries('Tasks')
        }
    })
};


export { useTasks, useUpdateDoneTask };
