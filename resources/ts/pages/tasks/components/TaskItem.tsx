import React from "react";
import { Task } from "../../../types/Task";

type Props = {
    task: Task
}

const TaskItem: React.FC<Props> = ({ task }) => {
    return (
        <li className={task.is_done ? 'done' : ''}>
            <label className="checkbox-label">
                <input type="checkbox" className="checkbox-input" />
            </label>
            <div>
                <span>{task.title}</span>
            </div>
            <button className="btn is-delete">削除</button>
        </li>
    )
}

export default TaskItem
