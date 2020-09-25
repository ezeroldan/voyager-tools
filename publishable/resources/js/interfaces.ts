export interface iRootState {
    recaptchaToken: string;
}

export interface iModuloState {
}

export interface iMapa {
    lat: number;
    lng: number;
}

export interface iMarker {
    id?: number;
    icon?: string;
    label?: string;
    title?: string;
    zIndex?: number;
    visible?: boolean;
    opacity?: number;
    position: iMapa;
    animation?: any;
}