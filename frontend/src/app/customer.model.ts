import { Order } from "./order.model";
/**
 * Interfaccia rappresentante Customer
 */
export interface Customer {
    id: number;
    name: string;
    image: string;
    address: string;
    email: string;
    orders: Order[];
}