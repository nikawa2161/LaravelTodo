import * as api from "../api/TaskAPI";
import { useQuery, useMutation, useQueryClient } from "react-query";
import { toast } from "react-toastify"

const useTasks = () => {
    return useQuery("tasks", async () => api.getTasks());
};


const useUpdateDoneTask = () => {
    const queryClient = useQueryClient()

    return useMutation(api.updateDoneTask, {
        onSuccess: () => {
            queryClient.invalidateQueries('Tasks')
        },
        onError: () => {
            toast.error('更新に失敗しました。');
        }
    })
};


export { useTasks, useUpdateDoneTask };
