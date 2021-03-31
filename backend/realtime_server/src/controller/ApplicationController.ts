import { getRepository } from "typeorm";
import { NextFunction, Request, Response } from "express";
import { Application } from '../entity/Application'
import { IApplication } from '../type/Interfaces'
import { Controler } from "./Controller";

export class ApplicationController extends Controler {
    private applicationRepo = getRepository(Application)

    async get() {
        return [{
            name: 'hello'
        }];
    }

    async create(request: Request, response: Response, next: NextFunction) {

        let authToken = request.headers.authorization.toString().replace('Bearer', '').trim();

        if (authToken === process.env.CP_API_TOKEN) {
            return 'All good!!';
            // return this.applicationRepo.save(request.body);
        } else {
            return `Not so good ${authToken} == ${process.env.CP_API_TOKEN}`;
        }
    }


    private validateData(data: IApplication, creating: boolean = false) {
        let fields = {
            name: (val: string, creating: boolean) => {
                return (!!val) ? 'name value is missing': true
            }
        }
    }
}